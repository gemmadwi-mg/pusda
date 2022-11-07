<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormatter;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthenticationController extends Controller
{
        /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     operationId="login",
     *     @OA\Parameter(
     *          name="email",
     *          description="Email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:50'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::responseValidation($validator->errors());
        }

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                	'success' => false,
                	'message' => 'Kredensial masuk tidak valid.',
                ], 400);
            }
        } catch (JWTException $e) {
    	return $credentials;
            return response()->json([
                	'success' => false,
                	'message' => 'Tidak dapat membuat token.',
                ], 500);
        }
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);

    }

     /**
     * @OA\Get(
     *     path="/api/user",
     *     tags={"Authentication"},
     *     operationId="User",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function getUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }

     /**
     * @OA\Get(
     *     path="/api/logout",
     *     tags={"Authentication"},
     *     operationId="logout",
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function logout(Request $request)
    {
        // Auth::logout();
        // return ResponseHelper::responseSuccess('Log out successfully!');

        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        // kirim Gagal response jika request tidak valid
        if ($validator->fails()) {
            return ResponseFormatter::responseValidation($validator->errors());
        }

		// Request divalidasi, lakukan logout
        try {
            JWTAuth::invalidate($request->token);
            return ResponseFormatter::responseSuccess('Logout berhasil!');
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Maaf, pengguna tidak dapat logout'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/reset-password",
     *     tags={"Authentication"},
     *     operationId="resetpassword",
     *     @OA\Parameter(
     *          name="email",
     *          description="Email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="password",
     *          description="Password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="password_confirmation",
     *          description="password_confirmation",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="successful operation"
     *     )
     * )
     */
    public function reset_password(Request $request,$id)
    {
        $credentials = $request->only('email', 'password','password_confirmation');
        $validator = Validator::make($credentials, [
            'email' => 'required|email|unique:users,email,except,id,'.$id,
            'password' => 'required|string|min:8|max:50|confirmed'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::responseValidation($validator->errors());
        }

        try {
            $user =  User::find($id);
            $user->email  = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole($request->role_id);

            return ResponseFormatter::responseSuccessWithData('Kata sandi anda berhasil di atur ulang,Silakan Login!', $user);

            } catch(Exception $e){
                return ResponseFormatter::responseError($e->getMessage(), 400);
            }

    }
}
