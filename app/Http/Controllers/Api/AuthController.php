<?php
/**
 * Created by PhpStorm.
 * UserOld: pbsoft02
 * Date: 29/03/17
 * Time: 10:33
 */

namespace SA\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SA\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        try{
            $token = \JWTAuth::attempt($credentials);
        }catch(JWTException $ex){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        if (!$token){
            return response()->json(['error' => 'credentials_invalids'], 401);
        }

        //return response()->json(compact('token'));
        return $this->dadosUsuario($token);
    }

    public function logout()
    {
        try{
            \JWTAuth::invalidate();
        }catch(JWTException $ex){
            return response()->json(['error' => 'could_not_invalidate_token', 500]);
        }

        return response()->json([], 204);
    }

    public function refreshToken(Request $request)
    {
       try{
           $bearerToken = \JWTAuth::setRequest($request)->getToken();
           $token = \JWTAuth::refresh($bearerToken);
       }catch(JWTException $exception){
           return response()->json(['error' => 'could_not_refresh_token', 500]);
       }
       return response()->json(compact('token'));

    }

//    protected function guard()
//    {
//        return Auth::guard('name');
//    }

    //Pegando os dados do usuario logado
    public function dadosUsuario($token)
    {
        $user = Auth::user();
        return compact('token', 'user');
    }

//    public function grupoUsuario($token)
//    {
//        $token = $token->segUserGroups->group_id;
//    }

}