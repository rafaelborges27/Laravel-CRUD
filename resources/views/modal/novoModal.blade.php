<div class="modal fade" id="modalNovo" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formNovo" method="POST" action="">
          {{$slot}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" onclick="salvarNovo()" id="btnSalvarNovo" value="" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>