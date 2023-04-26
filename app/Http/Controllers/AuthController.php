<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTFactory;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'genders_id'=> 'required',
            'phone_no'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 422);
        };

        $user=$request->all();
        $user['password'] = bcrypt($request -> password);
        // $user['status'] = config('constant.user_status.Active');
        $user['status'] = 1;

        $user = User::create($user);
        // $user->save();
        $jwt_token = auth()->login($user);

        return response()->json([
            'user_id'=>$user->id,
            'name'=>$user->name,
            'token'=>$jwt_token,
            'user'=>$user
        ]);

    }
}
