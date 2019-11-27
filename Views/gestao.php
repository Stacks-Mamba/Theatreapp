<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Gestão de lugares</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <style>
      <?php  require "external/bootstrap/css/bootstrap.min.css"; ?>
    </style>
    <style>
      <?php  require "style/font.css"; ?>
    </style>
    <style>
      <?php require "style/gestao.css";?>
    </style>
  </head>
  <body>
    <?php include "components/navbar.php"?>
    <aside id = "side-bar">
      <?php require "components/sidebar.php";?>
    </aside>
    <div id = "main" class = "container w-85 h-100">
      <div class="row w-100">
        <div class = "col-sm-12">
          <h2 class = "h2" style="color:black">Gestão de Lugares</h2>
          <div id = "search-area">
            <p class = "h5" style="color:black">Escolha um lugar para editar</p>
            </form>
              <div class = "form-group">
                <label for = "search-fila-input">Número da fila</label>
                <input id = "search-fila-input" type = "number" class = "form-control w-50" placeholder="Fila"/>
                <div class="invalid-feedback">Preencha todos os campos</div>
              </div>
              <div class = "form-group">
                <label for = "search-lugar-input">Número do lugar</label>
                <input id = "search-lugar-input" type = "number" class = "form-control w-50" placeholder="Lugar"/>
                <div class="invalid-feedback">Preencha todos os campos</div>
              </div>
              <div class = "form-group">
                <label for = "search-tipo-select">Tipo do lugar</label>
                <select id = "search-tipo-select" class = "form-control w-50">
                  <option value = "1">Plateia</option>
                  <option value = "2">Balcão</option>
                </select>
              </div>
              <button id = "pesquisa-btn" class = "btn btn-primary" type = "button">Pesquisar</button>
            <form>
          </div>
        </div>
      </div>
    </div>
    <?php include "components/edit_modal.php";?>
    <?php include "components/result_modal.php";?>
    <script type="text/javascript">
      <?php require "external/jquery.js";?>
    </script>
    <script type="text/javascript">
      <?php require "external/bootstrap/js/bootstrap.bundle.js";?>
    </script>
    <script type="text/javascript">
      <?php require "scripts/gestao.js";?>
    </script>
  </body>
</html>
