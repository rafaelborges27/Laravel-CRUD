<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {

        $email=$request->input('email');
        $senha=$request->input('password');

        $user = User::where('email', $email)->first();

        if($user){
            if($user->deleted_at == null){
                if(Hash::check($senha, $user->password)){
                    $response = array(
                      'status' => 'success',
                      'msg' => 200,
                    );
                    return response()->json($response);
                }

            }else{
                $response = array(
                  'status' => 'fail',
                  'msg' => 'desativado',
                ); 
                return response()->json($response);
            }
        }else{
            $response = array(
              'status' => 'fail',
              'msg' => 'invalido',
            ); 
            return response()->json($response);
        }

        $response = array(
          'status' => 'fail',
          'msg' => 'senha',
        );

        return response()->json($response);
    }
}