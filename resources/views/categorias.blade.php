@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container">
    <div class="botaoAlign">
    <button class="col-sm-3 btn btn-sm botaoCor" onclick="modalNovo(1)" type="button">NOVA CATEGORIA</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
              <thead class="botaoCorEx">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Usuário</th>
                  <th scope="col">Cor</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categorias as $ct)
                    <tr id="linha{{$ct->id}}">
                      <th scope="row">{{$ct->id}}</th>
                      <td id="name{{$ct->id}}">{{$ct->name}}</td>
                      <td id="user{{$ct->id}}">{{$ct->user}}</td>
                      <td id="color{{$ct->id}}">{{$ct->color}}</td>
                      <td>
                        <button class="col-sm-5 btn btn-sm botaoCor" onclick="modalEditarCat({{$ct->id}})" type="button">EDITAR</button>
                        <button class="col-sm-5 btn btn-sm botaoCorEx" onclick="modalDelete({{$ct->id}}, 1)" type="button">EXCLUIR</button>
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
        <label>Nome</label>
        <input type="text" class="form-control" name="name" id="novoNome">
        <label>Descrição</label>
        <input type="text" class="form-control" name="novoCpf" id="novaDescricao">
        <label>Cor</label>
        <select class="form-control" name="email" id="novaCor">
            <option>ORANGE</option>
            <option>PURPLE</option>
            <option>GREY</option>
            <option>GREEN</option>
            <option>BLUE</option>
            <option>BLACK</option>
            <option>NONE</option>
        </select>
    </div>
@endcomponent
@component('modal.novoModal')
    <div class="row col-sm-8">
        <label>Nome</label>
        <input type="text" class="form-control" name="name" id="novoNome1">
        <label>Descrição</label>
        <input type="text" class="form-control" name="novoCpf" id="novaDescricao1">
        <label>Cor</label>
        <select class="form-control" name="email" id="novaCor1">
            <option>ORANGE</option>
            <option>PURPLE</option>
            <option>GREY</option>
            <option>GREEN</option>
            <option>BLUE</option>
            <option>BLACK</option>
            <option>NONE</option>
        </select>
    </div>
@endcomponent
@component('modal.deleteModal')
  <label>Deseja excluir a categoria?</label>
@endcomponent
@endsection
