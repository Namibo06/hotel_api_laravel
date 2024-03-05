<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutenticationController extends Controller
{
    public function sign_in(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'password'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>'422',
                'message'=>$validator->errors()
            ]);
        }

        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $email=$request->email;
        $phone=$request->phone;
        $password=$request->password;

        $user = new User();
        $user->first_name=$first_name;
        $user->last_name=$last_name;
        $user->email=$email;
        $user->phone=$phone;
        $user->password=$password;

        $user->save();

        if(!$user->save()){
            return response()->json([
                'status'=>'400',
                'message'=> 'Não foi possível criar o usuário'
            ]);
        }

        return response()->json([
            'status'=>'201',
            'message'=>'Usuário criado',
            'user'=>$user
        ]);
    }

    public function sign_up(Request $request){

    }

}
