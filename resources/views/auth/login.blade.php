@extends('layouts.app')

@section('content')
    <form class="form-signin teste" id="formLogin" method="POST" action="{{ route('login') }}">
      @csrf
      <h1 class="h3 mb-3 font-weight-bold">TASK MANAGER</h1>
      <div class="faixaDiv"></div> 
      <div class="labelEmail">
        <label >E-mail</label>
        <input type="email" id="inputEmail" class="form-control" name="email" required autofocus>
        <label class="passLabel">Senha</label>
        <input type="password" id="inputPassword" name="password" class="form-control" required>
        <br>
        <div class="botaoCnt">
          <button class="col-sm-5 btn btn-sm botaoCor" onclick="loginBotao()" type="button">ENTRAR</button>
        </div>
      </div>
    </form>
@endsection
