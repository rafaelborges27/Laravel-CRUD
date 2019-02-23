@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container">
    <div class="botaoAlign">
    <button class="col-sm-2 btn btn-sm botaoCor" onclick="modalNovo()" type="button">NOVO USUÁRIO</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered">
              <thead class="botaoCorEx">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $us)
                    <tr id="linha{{$us->id}}">
                      <th scope="row">{{$us->id}}</th>
                      <td id="name{{$us->id}}">{{$us->name}}</td>
                      <td id="cpf{{$us->id}}">{{$us->cpf}}</td>
                      <td id="email{{$us->id}}">{{$us->email}}</td>
                      <td>
                        <button class="col-sm-5 btn btn-sm botaoCor" onclick="modalEditar({{$us->id}})" type="button">EDITAR</button>
                        <button class="col-sm-5 btn btn-sm botaoCorEx" onclick="modalDelete({{$us->id}})" type="button">EXCLUIR</button>
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
        <input type="text" class="form-control" name="name" id="nomeInput">
        <label>CPF</label>
        <input type="text" maxlength="11" class="form-control" name="cpf" id="cpfInput">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="emailInput">
        <label>Senha</label>
        <input type="password" class="form-control" name="password" id="senhaInput" placeholder="******">
    </div>
@endcomponent
@component('modal.novoModal')
    <div class="row col-sm-8">
        <label>Nome</label>
        <input type="text" class="form-control" name="name" id="novoNome">
        <label>CPF</label>
        <input type="text" maxlength="11" class="form-control" name="novoCpf" id="novoCpf">
        <label>Email</label>
        <input type="email" class="form-control" name="email" id="novoEmail">
        <label>Senha</label>
        <input type="password" class="form-control" name="password" id="novaSenha">
    </div>
@endcomponent
@component('modal.deleteModal')
  <label>Deseja excluir o usuário?</label>
@endcomponent
@endsection
