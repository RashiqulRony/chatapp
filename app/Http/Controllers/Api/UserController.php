<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\User;
use App\Traits\MediaUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use MediaUpload;

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

    public function updateProfile(Request $request)
    {
        $userId = auth('api')->id();
        $rules = [
            'name'  => 'required|max:200',
            'email' => 'required|email|unique:users,email,'.$userId,
            'mobile' => 'required|max:15|unique:users,mobile,'.$userId,
            'address' => 'nullable|max:300',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()], 422);
        }

        try {
            $image['name'] = null;
            $user = User::find($userId);
            if ($request->hasFile('image')) {
                if ($user->image) {
                    $this->mediaDelete('users', $user->image);
                }
                $image = $this->imageUpload($request->file('image'), 'users', '', $user->id);
            }

            if ($user) {
                $user->update([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'mobile'    => $request->mobile,
                    'image'     => $image['name'] ?? $user->image,
                    'address'   => $request->address,
                    'github'    => $request->github,
                    'gitlab'    => $request->gitlab,
                    'bitbucket' => $request->bitbucket,
                    'linkedin'  => $request->linkedin,
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'User not found'
                ], 404);
            }
            return response()->json([
                'status' => true,
                'data' => $user,
                'message' => "Profile update successfully.",
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }



    }
}
