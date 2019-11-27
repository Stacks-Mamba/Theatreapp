<div class = "modal fade" id = "edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Editar lugar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class = "modal-body">
        <form>
          <div class = "form-group">
            <label for = "input-fila">Fila</label>
            <input class = "form-control" id = "input-fila"type="number" min="1" max="100" readonly/>
          </div>
          <div class = "form-group">
            <label for = "input-lugar">Número do Lugar</label>
            <input class = "form-control" id = "input-lugar"type="number" min="1" max="100" readonly/>
          </div>
          <div class = "form-group">
            <label for = "input-lugar">Número do Balcão/Secção</label>
            <input class = "form-control" id = "input-secb"type="text" readonly/>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class = "form-group">
            <label for = "tipo-input">Tipo do Lugar</label>
            <select class = "form-control" id = "tipo-input"type="number">
              <option id="opt-1" value="1"></option>
              <option id="opt-2" value="0"></option>
            </select>
          </div>
          <div class = "form-group">
            <label for = "reservado-input">Reservado?</label>
            <select class = "form-control" id = "reservado-input" type="number">
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <button class = "btn btn-primary" type="button" id="submit-btn">Editar lugar</button>
          <button class = "btn btn-danger" type="button" id="delete-btn">Apagar lugar</button>
        </form>
      </div>
    </div>
  </div>
</div>
