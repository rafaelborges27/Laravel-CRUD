<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Categorias;
use App\Tarefas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::id())->first();
        $categorias = Categorias::where('deleted_at', null)->get();
        $task = Tarefas::where('tasks.deleted_at', null)->where('tasks.done', 'NO')
        ->select('users.name as user', 'categories.name as categoria', 'tasks.description', 'color', 'tasks.id as id', 'tasks.done as done')
        ->leftJoin('users', 'user_id', 'users.id')
        ->leftJoin('categories', 'category_id', 'categories.id')
        ->orderBy('tasks.id', 'desc')->get();
        return view('home', compact('task', 'categorias', 'user'));
    }

    public function concluir(Request $request){
        $data=$request->all();
        $cat = Tarefas::where('id', $data['id'])->first();
        $cat->done = 'YES';
        $cat->save();

        $response = array(
          'msg' => 200,
        );

         return response()->json($response);
    }
}
