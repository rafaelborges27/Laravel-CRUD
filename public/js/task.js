//Arquivo para realizar as comunicações de login via AJAX


function loginBotao() {
	var CSRF_TOKEN = $('[name="_token"]').val();
	$.ajax({
      	url : "/loginGo",
      	type : 'post',
      	data : {
      		_token: CSRF_TOKEN,
           	email : $('#inputEmail').val(),
           	password :$('#inputPassword').val(),
      	},
	})
	.done(function(msg){
    switch(msg.msg){
      case 'senha':
        $.alert({
          title: 'Erro!',
          content: 'Senha invalida!',
        });
      break;
      case 'desativado':
        $.alert({
          title: 'Erro!',
          content: 'Usuário excluido ou desativado!',
        });
      break;
      case 'invalido':
        $.alert({
          title: 'Erro!',
          content: 'Email invalido!',
        });
      break;
      case 200:
        $('#formLogin').submit();
      break;
    }
  })
}

function modalEditar(id){
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
        url : "/usuarioData",
        type : 'post',
        data : {
          _token: CSRF_TOKEN,
            id : id,
        },
  }).done(function(response){
    $('#nomeInput').val(response.name);
    $('#cpfInput').val(response.cpf);
    $('#emailInput').val(response.email);
    $('#formEditar').attr('action', '/editarUser')
    $('#btnSalvar').val(id);
  });
  $('#modalEditar').modal('show');
}



function salvaEdit() {
  auxNome = $('#nomeInput').val();
  auxCpf = $('#cpfInput').val();
  auxEmail = $('#emailInput').val();
  if(auxNome != '' && auxCpf != '' && auxEmail != ''){
    var CSRF_TOKEN = $('[name="_token"]').val();
    $.ajax({
          url : "/usuarioEdit",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              name : $('#nomeInput').val(),
              cpf : $('#cpfInput').val(),
              email : $('#emailInput').val(),
              senha : $('#senhaInput').val(),
              id : $('#btnSalvar').val(),
          },
    }).done(function(response){
      if(response.msg == 200){
        aux = $('#btnSalvar').val();
        $('#name'+aux).html($('#nomeInput').val());
        $('#cpf'+aux).html($('#cpfInput').val());
        $('#email'+aux).html($('#emailInput').val());
        $('#modalEditar').modal('hide');
      }
    });
  }else{
    alert('Campos Obrigatórios: Nome, CPF e Email');
  }
}


function modalNovo(num) {
  if(num == 1){
    $('#btnSalvarNovo').attr('onclick', 'novaCat()');
    $('#novoNome').val('');
    $('#novaDescricao').val('');
  }
  if(num == 2){
    $('#btnSalvarNovo').attr('onclick', 'novaTask()');
    $('#novaDescricao').val('');
  }
  $('#modalNovo').modal('show');
}

$(document).ready(function(){
    $('input[type="date"]').change(function(){
        var auxData = this.value;
        $('#dataVal').val(auxData);
    });
});

function novaTask(){
  var CSRF_TOKEN = $('[name="_token"]').val();
  auxDescricao = $('#novaDescricao1').val();
  auxCategoria = $('#novaCategoria1 option:selected').val();
  auxPrevisao = $('#dataVal').val();

  if(auxDescricao != '' && auxCategoria != '' && auxPrevisao != ''){
    $.ajax({
          url : "/tarefaNova",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              description : auxDescricao,
              priority : $('#novaPrioridade1').val(),
              category_id : auxCategoria,
              end_forecast_date : auxPrevisao,
          },
    }).done(function(response){
      if(response.msg == 200){
        location.reload();
      }
    });
  }else{
    alert("Preencher os campos");
  }
}

function salvarNovo() {
  var CSRF_TOKEN = $('[name="_token"]').val();
  auxNome = $('#novoNome').val();
  auxCpf = $('#novoCpf').val();
  auxEmail = $('#novoEmail').val();
  auxSenha = $('#novaSenha').val();
  if(auxNome != '' && auxCpf != '' && auxEmail != '' && auxSenha != ''){
    $.ajax({
          url : "/usuarioNovo",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              name : auxNome,
              cpf : auxCpf,
              email : auxEmail,
              senha : auxSenha,
          },
    }).done(function(response){
      if(response.msg == 200){
        location.reload();
      }else{
        alert("O Campo de email já esta sendo utilizado!")
      }
    });
  }else{
     alert('Preencha todos os campos');
  }
}

function modalDelete(id, num) {
  if(num == 1){
    $('#btnDel').attr('onclick', 'delCat()');
  }
  if(num == 2){
    $('#btnDel').attr('onclick', 'delTask()');
  }
  $('#modalDeletar').modal('show');
  $('#btnDel').val(id);

}

function del(){
  id = $('#btnDel').val();
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
          url : "/usuarioDelete",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              id : id
          },
  }).done(function(response){
    location.reload();
  });
}

function delTask(){
  id = $('#btnDel').val();
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
          url : "/taskDelete",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              id : id
          },
  }).done(function(response){
    location.reload();
  });
}

function delCat(){
  id = $('#btnDel').val();
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
          url : "/catDelete",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              id : id
          },
  }).done(function(response){
    location.reload();
  });
}

function novaCat(){
  var CSRF_TOKEN = $('[name="_token"]').val();
  auxNome = $('#novoNome1').val();
  auxDescricao = $('#novaDescricao1').val();
  auxCor = $('#novaCor1 option:selected').text();
  if(auxNome != '' && auxDescricao != ''){
    $.ajax({
          url : "/categoriaNova",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              name : auxNome,
              description : auxDescricao,
              color : auxCor,
          },
    }).done(function(response){
      if(response.msg == 200){
        location.reload();
      }
    });
  }else{
    alert("Preencher os campos");
  }
}

function modalEditarCat(id){
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
        url : "/categoriaEdit",
        type : 'post',
        data : {
          _token: CSRF_TOKEN,
            id : id,
        },
  }).done(function(response){
    $('#novoNome').val(response.name);
    $('#novaDescricao').val(response.description);
    $('#novaCor').val(response.color);
    $('#formEditar').attr('action', '/editarCat')
    $('#btnSalvar').val(id);
    $('#btnSalvar').attr('onclick', 'editCatGo()');
  });
  $('#modalEditar').modal('show');
}

function modalEditarTask(id){
  var CSRF_TOKEN = $('[name="_token"]').val();
  $.ajax({
        url : "/tarefaEdit",
        type : 'post',
        data : {
          _token: CSRF_TOKEN,
            id : id,
        },
  }).done(function(response){
    $('#novaPrioridade').val(response.priority);
    $('#novaDescricao').val(response.description);
    $('#novaCategoria').val(response.category_id);
    $('#novaPrevisao').val(response.previsao);
    $('#novoConcluido').val(response.done);
    $('#formEditar').attr('action', '/editarTask')
    $('#btnSalvar').val(id);
    $('#btnSalvar').attr('onclick', 'editTaskGo()');
  });
  $('#modalEditar').modal('show');
}


function editCatGo(){
  auxNome = $('#novoNome').val();
  auxDescricao = $('#novaDescricao').val();
  auxCor = $('#novaCor').val();
  if(auxNome != '' && auxDescricao != ''){
    var CSRF_TOKEN = $('[name="_token"]').val();
    $.ajax({
          url : "/categoriaEditGo",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              name : $('#novoNome').val(),
              description : $('#novaDescricao').val(),
              color : $('#novaCor').val(),
              id : $('#btnSalvar').val(),
          },
    }).done(function(response){
      if(response.msg == 200){
        aux = $('#btnSalvar').val();
        $('#name'+aux).html($('#novoNome').val());
        $('#color'+aux).html($('#novaCor').val());
        $('#modalEditar').modal('hide');
      }
    });
  }else{
    alert('Campos Obrigatórios: Nome e Descrição.');
  }
}

function editTaskGo(){
  auxDescricao = $('#novaDescricao').val();
  auxCategoria = $('#novaCategoria').val();
  auxPrevisao = $('#novaPrevisao').val();
  if(auxPrevisao != '' && auxDescricao != '' && auxCategoria){
    var CSRF_TOKEN = $('[name="_token"]').val();
    $.ajax({
          url : "/tarefaEditGo",
          type : 'post',
          data : {
            _token: CSRF_TOKEN,
              description : $('#novaDescricao').val(),
              priority : $('#novaPrioridade').val(),
              category_id : $('#novaCategoria').val(),
              end_forecast_date : auxPrevisao,
              done : $('#novoConcluido').val(),
              id : $('#btnSalvar').val(),
          },
    }).done(function(response){
      if(response.msg == 200){
        location.reload();
        aux = $('#btnSalvar').val();
        $('#name'+aux).html($('#novoNome').val());
        $('#color'+aux).html($('#novaCor').val());
        $('#modalEditar').modal('hide');
      }
    });
  }else{
    alert('Campos Obrigatórios: Descrição, Categoria e Previsão.');
  }
}

function taskConcluir(id){
  var CSRF_TOKEN = $('[name="_token"]').val();
      $.ajax({
            url : "/concluir",
            type : 'post',
            data : {
              _token: CSRF_TOKEN,
                id : id,
            },
      }).done(function(response){
        location.reload();
      });
} 