
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TASK MANAGER</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('bootstrap/dist/js/bootstrap.min.js')}}" rel="stylesheet"/>
    <link href="{{asset('bootstrap/site/docs/4.3/examples/sign-in/signin.css')}}" rel="stylesheet">
    <script type="text/javascript" src="js/task.js"></script>
  </head>

  <body class="text-center">
    <form class="form-signin">
      @csrf
      <h1 class="h3 mb-3 font-weight-bold">TASK MANAGER</h1>
      <div class="faixaDiv"></div> 
      <div class="labelEmail">
        <label >E-mail</label>
        <input type="email" id="inputEmail" class="form-control" required autofocus>
        <label class="passLabel">Senha</label>
        <input type="password" id="inputPassword" class="form-control" required>
        <br>
        <div class="botaoCnt">
          <button class="col-sm-5 btn btn-sm botaoCor" onclick="loginBotao()" type="button">ENTRAR</button>
        </div>
      </div>
    </form>
  </body>
</html>
