@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container">
    <div class="botaoAlign">
    <h3>Olá {{$user->name}}</h3><br>
    <span>Hoje é dia @php echo date('d-m-Y'); @endphp é você possui as seguintes tarefas para semre concluídas</span>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
              <thead class="botaoCorEx">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Tarefa</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Usuário</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($task as $tk)
                    <tr id="linha{{$tk->id}}">
                      <th scope="row">{{$tk->id}}</th>
                      <td id="name{{$tk->id}}">{{$tk->description}}</td>
                      <td id="user{{$tk->id}}"><i class="fas fa-circle" style="color:{{$tk->color}}; padding-right: 5px"></i>{{$tk->categoria}}</td>
                      <td id="color{{$tk->id}}">{{$tk->user}}</td>
                      <td>
                        @if($tk->done == 'NO')
                        <button class="col-sm-7 btn btn-sm botaoCor" onclick="taskConcluir({{$tk->id}})" type="button" id="btnConcluir">CONCLUIR</button>
                        @else
                          <i class="far fa-times-circle"></i>
                        @endif
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

@component('modal.deleteModal')
  <label>Deseja excluir a tarefa?</label>
@endcomponent

@endsection
