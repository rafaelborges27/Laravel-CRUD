<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categorias;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
{
	public function index(){
        $categorias = Categorias::where('categories.deleted_at', null)
        ->select('users.name as user', 'categories.name as name', 'description', 'color', 'categories.id as id')
        ->leftJoin('users', 'user_id', 'users.id')
        ->orderBy('categories.id', 'desc')->get();
        return view('categorias', compact('categorias'));
	}

	public function categoriaNova(Request $request){
		$data=$request->all();

		$user = Categorias::create([
							'user_id' => Auth::id(),
							'name' => $data['name'],
							'description' => $data['description'],
							'color' => $data['color'],
							]);

		$response = array(
          'msg' => 200,
        );
		return response()->json($response);
	}

	public function categoriaEdit(Request $request){
		$data=$request->all();

		$cat = Categorias::where('id', $data['id'])->first();

		$response = array(
          'name' => $cat['name'],
          'description' => $cat['description'],
          'color' => $cat['color']
        );
        return response()->json($response);

	}

	public function categoriaEditGo(Request $request){
		$data=$request->all();

		$cat = Categorias::where('id', $data['id'])->first();

		$cat->name = $data['name'];
		$cat->description = $data['description'];
		$cat->color = $data['color'];
		$cat->user_id = Auth::id();

		$cat->save();

		$user = User::where('id', Auth::id())->first();

		$response = array(
          'msg' => 200,
          'user' => $user['name'],
        );

		 return response()->json($response);
	}

	public function catDelete(Request $request){
		$data=$request->all();

		$cat = Categorias::where('id', $data['id'])->first();
		$cat->delete();

		$response = array(
          'msg' => 200,
        );
		return response()->json($response);
	}
}