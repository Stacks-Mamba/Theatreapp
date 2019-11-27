<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lugares</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <style>
      <?php  require "external/bootstrap/css/bootstrap.min.css"; ?>
    </style>
    <style>
      <?php  require "style/font.css"; ?>
    </style>
    <style>
      <?php  require "style/lugares.css"; ?>
    </style>
  </head>
  <body>
    <?php include "components/navbar.php"?>
    <aside id = "side-bar">
      <?php include "components/sidebar.php";?>
    </aside>
    <div id = "main" class = "container w-85 h-100">
      <div class = "row h-100">
        <div class = "col-sm-12">
          <h2 class = "h2" style="color:black">Lugares</h2>
          <div id = "content">
            <p class = "h5"> Lugares do teatro "Principal"</p>
            <button type = "button" id = "add-btn"class = "btn btn-primary">
              <i class="material-icons md-18 md-light inline-block icon">add</i>
              Adicionar Lugar
            </button>
            <table class="table table-dark w-100">
              <thead>
                <tr>
                  <th>Fila</th>
                  <th>Número</th>
                  <th>Vendido</th>
                  <th>Balcão/Secção</th>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($content as $lugar){
                  echo $lugar->getLugarInfo();
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php include "components/form_modal.php";?>
    <?php include "components/result_modal.php";?>
    <script type="text/javascript">
      <?php require "external/jquery.js"?>
    </script>
    <script type="text/javascript">
      <?php require "external/bootstrap/js/bootstrap.bundle.js"?>
    </script>
    <script type="text/javascript">
      <?php require "scripts/lugares.js"?>
    </script>
  </body>
</html>
