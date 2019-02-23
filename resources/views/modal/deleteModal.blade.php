<div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Excluir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formExcluir" method="POST" action="">
          {{$slot}}
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" onclick="del()" id="btnDel" value="" class="btn btn-danger">Sim, excluir</button>
      </div>
    </div>
  </div>
</div>