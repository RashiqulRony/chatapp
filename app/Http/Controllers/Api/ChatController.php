<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function createRoom(Request $request)
    {
        $rules = [
            'user_id'  => 'required|exists:users,id',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()], 422);
        }

        try {
            $roomSecretKey = (auth('api')->id() + $request->user_id);
            ChatRoom::create([
                'user_id_1' => auth('api')->id(),
                'user_id_2' => $request->user_id,
                'type' => 'Single',
                'room_secret_key' => bcrypt($roomSecretKey),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Room Created Successfully'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getChatLists()
    {
        try {
            $authId = auth('api')->id();
            $chatData = ChatRoom::where('room_admin_id', $authId)->orWhere('user_id_1', $authId)->orWhere('user_id_2', $authId)
                ->orderBy('updated_at', 'DESC')->get();
            $chatLists = [];
            foreach ($chatData as $data) {
                if ($data->user_id_1 == $authId) {
                    $user = User::findOrFail($data->user_id_2);
                    $chatLists[] = [
                        'chat_room_id' => $data->id,
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'image' => $user->image,
                        'type' => $data->type,
                        'date' => $data->updated_at->diffForHumans()
                    ];
                }
                if ($data->user_id_2 == $authId) {
                    $user = User::findOrFail($data->user_id_1);
                    $chatLists[] = [
                        'chat_room_id' => $data->id,
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'image' => $user->image,
                        'type' => $data->type,
                        'date' => $data->updated_at->diffForHumans()
                    ];
                }
            }

            return response()->json([
                'status' => true,
                'data' => $chatLists
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getChatInfo(Request $request)
    {
        try {
            $room = ChatRoom::find($request->chat_room_id);
            $chatUser = User::find($request->user_id);

            $data = [
                'room' => $room,
                'chat_user' => $chatUser,
            ];

            return response()->json([
                'status' => true,
                'data' => $data
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function createMessage(Request $request)
    {
        try {
            $authId = auth('api')->id();
            $secretNumber = $authId + $request->receiver_id;
            $roomCheck = ChatRoom::where('user_id_1', $authId)->where('user_id_2', $request->receiver_id)->find($request->chat_room_id);
            if (!$roomCheck) {
                $roomCheck = ChatRoom::where('user_id_1', $request->receiver_id)->where('user_id_2', $authId)->find($request->chat_room_id);
            }

            if ($roomCheck) {
                if(!Hash::check($secretNumber, $roomCheck->room_secret_key)) {
                    return response()->json([
                        'status' => false,
                        'message' => "Something went wrong. Please try again."
                    ], 500);
                }

                Chat::create([
                     'chat_room_id' => $roomCheck->id,
                     'sender_id'    => $authId,
                     'type'         => 'text',
                     'message'      => $request->message,
                ]);

                $roomCheck->updated_at = now();
                $roomCheck->save();

                return response()->json([
                    'status' => true,
                    'message' => "Message send successfully"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Something went wrong. Please try again."
                ], 500);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    public function getMessages(Request $request)
    {
        try {
            $today = Carbon::today();
            $yesterday = Carbon::yesterday();

            $messages = Chat::select(
                'type',
                'message',
                'sender_id',
                DB::raw('CASE
                    WHEN DATE(created_at) = CURDATE() THEN "Today"
                    WHEN DATE(created_at) = CURDATE() - INTERVAL 1 DAY THEN "Yesterday"
                    ELSE DATE(created_at)
                 END as date_group'),
            )
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy('date_group');

            return response()->json([
                'status' => true,
                'data' => $messages
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
