<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Login User
     *
     * @bodyParam email string required
     * The email or phone of the item. Example: test@test.com
     *
     * @bodyParam password string required
     * The password of the item. Example: ********
     *
     * @response {
     *      "status": true,
     *      "token": "JWT Auth Token",
     *      "token_type": "bearer",
     *      "user": {
     *          "id": 1,
     *          "name": "Rashiqul Rony",
     *          "email": "rony.mmj@gmail.com"
     *      }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $rules = [
            'email'  => 'required',
            'password' => 'required|string|min:4|max:50'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json(['status' => false, 'errors'=> $validator->messages()], 422);
        }

        try {
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['status'=> false, 'errors' => ['email' => ['Unauthorized email or password']]], 422);
            }

            return response()->json([
                'status'     => true,
                'message'    => "Login successfully",
                'token'      => $token,
                'token_type' => 'bearer',
                'user'       => auth('api')->user(),
                'expires'    => auth('api')->factory()->getTTL() * 60,
            ]);
        }catch (\Exception $exception) {
            return response()->json([
                'status'  => false,
                'message' => "This email and password incorrect",
            ]);
        }
    }

    /**
     * Login Register
     *
     * @bodyParam name string required
     * The email or phone of the item. Example: Mr Rony
     *
     * @bodyParam email string required
     * The email or phone of the item. Example: rony@gmail.com
     *
     * @bodyParam password string required min:8 Example: ********
     *
     * @bodyParam password_confirmation string required min:8 Example: ********
     *
     * @response {
     *      "status": true,
     *      "message": "Thanks for signing up! Please login now."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password', 'password_confirmation');
        $rules = [
            'name'      => 'required|max:191',
            'email'     => 'required|email|max:191|unique:users',
            'password'  => 'required|string|min:4|max:50|confirmed'
        ];

        try {
            $validator = Validator::make($credentials, $rules);
            if($validator->fails()) {
                return response()->json(['status' => false, 'errors'=> $validator->messages()], 422);
            }
            User::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => Hash::make($request->password),
                'email_verified_at' => now(),
            ]);
            return response()->json([
                'status'=> true,
                'message'=> 'Thanks for signing up! Please login now.'
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'status'=> false,
                'message'=> $exception->getMessage()
            ]);
        }
    }

    /**
     * Logout
     *
     * @authenticated
     *
     * @response {
     *      "status": true,
     *      "message": "Successfully logged out"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['status'=> true, 'message' => 'Successfully logged out']);
    }


    /**
     * Get Auth User
     *
     * @authenticated
     *
     * @response {
     *      "status": true,
     *      "data": {
     *          "id": 1,
     *          "name": "Rashiqul Rony",
     *          "email": "rony.mmj@gmail.com"
     *      }
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json([
            'status'     => true,
            'data'       => auth('api')->user(),
        ]);
    }

    /**
     * Refresh Token
     *
     * @authenticated
     *
     * @response {
     *      "status": true,
     *      "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJ..."
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        $newToken = auth('api')->refresh();
        auth('api')->logout();

        return response()->json([
            'status' => true,
            'token'  => $newToken,
        ]);
    }


    function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
