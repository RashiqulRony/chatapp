<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        try {
            $authId = auth('api')->id();
            $chatData = ChatRoom::where('room_admin_id', $authId)->orWhere('user_id_1', $authId)->orWhere('user_id_2', $authId)
                ->orderBy('updated_at', 'DESC')->get();
            $userIds = [];
            foreach ($chatData as $data) {
                if ($data->user_id_1 == $authId) {
                    $user = User::findOrFail($data->user_id_2);
                    $userIds[] = $user->id;
                }
                if ($data->user_id_2 == $authId) {
                    $user = User::findOrFail($data->user_id_1);
                    $userIds[] = $user->id;
                }
            }

            $users = User::when($request->key, function($query) use ($request){
                    return $query->where('name', 'like', '%' . $request->key .'%')->where('email', 'like', '%' . $request->key .'%');
                })->whereNotIn('id', $userIds)
                ->where('id', '!=', auth('api')->id())->paginate(10);

            return response()->json([
                'status' => true,
                'data' => $users
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}
