<div class = "modal fade" id = "formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class = "modal-dialog">
    <div class = "modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Adicionar Lugar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class = "modal-body">
        <p id = "input-hint"></p>
        <form>
          <div class = "form-group">
            <label for = "input-fila">Fila</label>
            <input class = "form-control" id = "input-fila"type="number" min="1" max="100"/>
          </div>
          <div class = "form-group">
            <label for = "input-lugar">Número do Lugar</label>
            <input class = "form-control" id = "input-lugar"type="number" min="1" max="100"/>
          </div>
          <div class = "form-group">
            <label for = "input-lugar">Número do Balcão/Secção</label>
            <input class = "form-control" id = "input-secb"type="text"/>
            <div class="invalid-feedback">
            </div>
          </div>
          <div class = "form-group">
            <label for = "tipo-input">Tipo do Lugar</label>
            <select class = "form-control" id = "tipo-input"type="number">
              <option value="1">Plateia (Não protocolar)</option>
              <option value="2">Plateia (protocolar)</option>
              <option value="3">Balcão (fumador)</option>
              <option value="4">Balcão (Não fumador)</option>
            </select>
          </div>
          <div class = "form-group">
            <label for = "reservado-input">Reservado?</label>
            <select class = "form-control" id = "reservado-input" type="number">
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <button class = "btn btn-primary" type="button" id="submit-btn">Adicionar lugar</button>
        </form>
      </div>
    </div>
  </div>
</div>
