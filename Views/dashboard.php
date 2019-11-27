<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      <?php  require "external/bootstrap/css/bootstrap.min.css"; ?>
    </style>
    <style>
      <?php  require "style/font.css"; ?>
    </style>
    <style>
      <?php  require "style/dashboard.css"; ?>
    </style>
  </head>
  <body>
    <?php include "components/navbar.php";?>
    <aside id = "side-bar">
      <?php include "components/sidebar.php";?>
    </aside>
    <div class="container w-85 h-100" id = "main">
      <div class = "row h-100">
        <div class = "col-sm-12">
          <h2 class = "h2" style="color:black">Dashboard</h2>
          <div class = "dash-info">
            <p class = "h5">Informações Gerais</p>
            <div class = "card-deck w-100">
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <h5 class = "card-title">Lugares vendidos</h5>
                  <p class = "card-text h4">
                    <?php echo $content["vendidos"];?>
                  </p>
                </div>
              </div>
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <h5 class = "card-title">Lugares Disponíveis</h5>
                  <p class = "card-text h4">
                    <?php echo $content["disponiveis"];?>
                  </p>
                </div>
              </div>
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <h5 class = "card-title">Total arrecadado</h5>
                  <p class = "card-text h4">
                    <?php echo $content["arrecadado"]." AOA";?>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class = "dash-info">
            <p class = "h5">Informações Específicas</p>
            <div class = "card-deck w-100">
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <h5 class = "card-title">Lugares de balcão vendidos</h5>
                  <p class = "card-text h4">
                    <?php echo $content["lugares_balcao_vendidos"];?>
                  </p>
                  <button type = "button" id = "balcaoBtn" class = "btn btn-primary">Ver Lugares</button>
                </div>
              </div>
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <p class = "card-text h4">
                    <?php echo $content["lugares_plateia_vendidos"]."%";?>
                  </p>
                  <h5 class = "card-title">Lugares de plateia vendidos</h5>
                </div>
              </div>
              <div class = "card text-center text-white bg-dark col-8 col-md-6 col-lg-3">
                <div class = "card-body">
                  <h5 class = "card-title">Lugares de protocolo vendidos</h5>
                  <p class = "card-text h4">
                    <?php echo $content["lugares_protocolares"];?>
                  </p>
                </div>
              </div>
              <div class ="w-100"></div>
              <div class = "card text-center text-white bg-dark col-8  col-md-6 col-lg-4">
                <div class = "card-body">
                  <h5 class = "card-title">Lugares de Fumadores vendidos</h5>
                  <p class = "card-text h4">
                    <?php echo $content["lugares_fumadores"];?>
                  </p>
                </div>
              </div>
              <div class = "card text-center text-white bg-dark col-8  col-md-6 col-lg-4">
                <div class = "card-body">
                  <h5 class = "card-title">Total arrecadado (Lugares de protocolo)</h5>
                  <p class = "card-text h4">
                    <?php echo $content["lugares_protocolares_income"]." AOA";?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class = "modal fade" id = "formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class = "modal-dialog">
        <div class = "modal-content">
          <div class = "modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lugares de balcão</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class = "modal-body">
            <table class = "table w-100">
              <thead>
                <tr>
                  <th>Fila</th>
                  <th>Número</th>
                  <th>Fumador</th>
                  <th>Preço de venda</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach($content["lugares_balcao_data"] as $lugar){
                    echo $lugar->getSaleInfo();
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      <?php require "external/jquery.js"?>
    </script>
    <script type="text/javascript">
      <?php require "external/bootstrap/js/bootstrap.bundle.js"?>
    </script>
    <script type="text/javascript">
      <?php require "scripts/dashboard.js"?>
    </script>
  </body>
</html>
