<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categorias;
use App\Tarefas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TarefasController extends Controller
{
	public function index(){
		$categorias = Categorias::where('deleted_at', null)->get();
        $task = Tarefas::where('tasks.deleted_at', null)
        ->select('users.name as user', 'categories.name as categoria', 'tasks.description', 'color', 'tasks.id as id')
        ->leftJoin('users', 'user_id', 'users.id')
        ->leftJoin('categories', 'category_id', 'categories.id')
        ->orderBy('tasks.id', 'desc')->get();
        return view('tarefas', compact('task', 'categorias'));
	}

	public function tarefaNova(Request $request){
		$data=$request->all();

		$user = Tarefas::create([
				'user_id' => Auth::id(),
				'category_id' => $data['category_id'],
				'priority' => $data['priority'],
				'description' => $data['description'],
				'done' => 'NO',
				'end_forecast_date' => $data['end_forecast_date'],
				]);

		$response = array(
          'msg' => 200,
        );
		return response()->json($response);
	}

	public function tarefaEdit(Request $request){
		$data=$request->all();

		$cat = Tarefas::where('id', $data['id'])->first();

		$response = array(
          'category_id' => $cat['category_id'],
          'description' => $cat['description'],
          'priority' => $cat['priority'],
          'done' => $cat['done'],
          'previsao' => $cat['end_forecast_date']
        );
        return response()->json($response);

	}

	public function tarefaEditGo(Request $request){
		$data=$request->all();

		$task = Tarefas::where('id', $data['id'])->first();

		$task->category_id = $data['category_id'];
		$task->description = $data['description'];
		$task->priority = $data['priority'];
		$task->end_forecast_date = $data['end_forecast_date'];
		$task->done = $data['done'];
		$task->user_id = Auth::id();

		$task->save();

		$user = User::where('id', Auth::id())->first();

		$response = array(
          'msg' => 200,
          'user' => $user['name'],
        );

		 return response()->json($response);
	}

	public function taskDelete(Request $request){
		$data=$request->all();

		$cat = Tarefas::where('id', $data['id'])->first();
		$cat->delete();

		$response = array(
          'msg' => 200,
        );
		return response()->json($response);
	}

}