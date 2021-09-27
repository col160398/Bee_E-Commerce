<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\ApiLoginRequest;
use Laravel\Passport\Client;

class ApiAuthController extends Controller
{
    public function login(ApiLoginRequest $request)
    {
        $passwordGrantClient = Client::where('password_client',1)->first();
        $data = [
            'grant_type' => 'password',
            'client_id' => $passwordGrantClient->id,
            'client_secret' => $passwordGrantClient->secret,
            'username'=>$request->email,
            'password'=>$request->password,
            'scope'=>'*',
        ];
        $tokenRequest = Request::create('/oauth/token','post',$data);
        return app()->handle($tokenRequest);
        // return response()->json(["data"=>$passwordGrantClient]);
    }
    public function register(ApiRegisterRequest $request)
    {
        $user = User::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'password'=>Hash::make($request->password)
        ]);
        if(!$user){
            return response()->json(["success"=>false,"message"=>'Registration Failed'],500);
        }
        return response()->json(["success"=>true,"message"=>'Registration Succeeded']);
    }
}
