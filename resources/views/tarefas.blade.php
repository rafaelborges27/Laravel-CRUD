@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container">
    <div class="botaoAlign">
    <button class="col-sm-3 btn btn-sm botaoCor" onclick="modalNovo(2)" type="button">NOVA TAREFA</button>
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
                        <button class="col-sm-5 btn btn-sm botaoCor" onclick="modalEditarTask({{$tk->id}})" type="button">EDITAR</button>
                        <button class="col-sm-5 btn btn-sm botaoCorEx" onclick="modalDelete({{$tk->id}}, 2)" type="button">EXCLUIR</button>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

@component('modal.editarModal')
    <div class="row col-sm-8">
        <label>Descrição</label>
        <input type="text" class="form-control" name="novoCpf" id="novaDescricao">
        <label>Prioridade</label>
         <select class="form-control" name="priority" id="novaPrioridade">
            <option>LOW</option>
            <option>MEDIUM</option>
            <option>HIGH</option>
        </select>
        <label>Categoria</label>
        <select class="form-control" name="priority" id="novaCategoria">
            @foreach($categorias as $ct)
                <option value="{{$ct->id}}">{{$ct->name}}</option>
            @endforeach
        </select>
        <label>Previsao de Termino</label>
        <input class="form-control" type="date" name="novaPrevisao" id="novaPrevisao">
        <label>Concluido</label>
        <select class="form-control" name="concluido" id="novoConcluido">
            <option >NO</option>
            <option >YES</option>
        </select>
    </div>
@endcomponent
@component('modal.novoModal')
    <div class="row col-sm-8">
        <label>Descrição</label>
        <input type="text" class="form-control" name="novaDescricao1" id="novaDescricao1">
        <label>Prioridade</label>
         <select class="form-control" name="priority" id="novaPrioridade1">
            <option>LOW</option>
            <option>MEDIUM</option>
            <option>HIGH</option>
        </select>
        <label>Categoria</label>
         <select class="form-control" name="categoria" id="novaCategoria1">
            @foreach($categorias as $ct)
                <option value="{{$ct->id}}">{{$ct->name}}</option>
            @endforeach
        </select>
        <label>Previsao de Termino</label>
        <input class="form-control" type="date" name="novaPrevisao" id="novaPrevisao">
        <input type="hidden" value="" id="dataVal">
    </div>
@endcomponent
@component('modal.deleteModal')
  <label>Deseja excluir a tarefa?</label>
@endcomponent
@endsection
