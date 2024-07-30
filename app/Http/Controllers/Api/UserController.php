<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        try {
            $users = User::when($request->key, function($query) use ($request){
                    return $query->where('name', 'like', '%' . $request->key .'%')->orWhere('email', 'like', '%' . $request->key .'%');
                })->where('id', '!=', auth('api')->id())->get();

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
