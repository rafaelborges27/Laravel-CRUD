<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

	public function index(){
        $user = User::where('deleted_at', null)->get();
        return view('usuarios', compact('user'));
	}

	public function usuarioData(Request $request){

        $data=$request->all();

		$user = User::where('id', $data['id'])->first();

		$response = array(
          'name' => $user['name'],
          'cpf' => $user['cpf'],
          'email' => $user['email']
        );
        return response()->json($response);

	}

	public function usuarioEdit(Request $request){
		$data=$request->all();

		$user = User::where('id', $data['id'])->first();

		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->cpf = $data['cpf'];
		if($data['senha'] != null){
			$user->password = Hash::make($data['senha']);
		}

		$user->save();

		$response = array(
          'msg' => 200,
        );

		 return response()->json($response);
	}

	public function usuarioNovo(Request $request){
		$data=$request->all();

		$user = User::where('email', $data['email'])->first();

		if($user == null){
			$senha = Hash::make($data['senha']);
			$user = User::create([
							'name' => $data['name'],
							'cpf' => $data['cpf'],
							'email' => $data['email'],
							'password' => $senha,
							]);

			$response = array(
	          'msg' => 200,
	        );
		}else{
			$response = array(
	          'msg' => 'erro',
	        );
		}

		return response()->json($response);

	}

	public function usuarioDelete(Request $request){
		$data=$request->all();

		$user = User::where('id', $data['id'])->first();
		$user->delete();

		$response = array(
          'msg' => 200,
        );
		return response()->json($response);
	}

}