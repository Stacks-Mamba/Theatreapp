<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      <?php  require "external/bootstrap/css/bootstrap.min.css"; ?>
    </style>
    <style>
      <?php  require "style/homepage.css"; ?>
    </style>
    <style>
      <?php  require "style/font.css"; ?>
    </style>
  </head>
  <body>
    <nav id = "usernav" class="navbar fixed-top">
      <div class="">
        <i class="material-icons md-36 md-light icon">theaters</i>
        <a class="navbar-brand" href="#" aria-disabled="true">Havana Theatre</a>
      </div>
      <a href="../logout"><button class = "btn btn-warning" type="button" name="button">Terminar sessão</button></a>
    </nav>
    <img id = "background" class = "img-fluid" src="../../Views/external/images/userbg.jpg" alt="alt"/>
    <div id = "main" class="container-fluid">
      <div id = "nav-row" class="row w-100">

      </div>
      <div id="text-row" class="row w-100">
        <div class="col-1 col-sm-2"></div>
        <div id = "Text"class="col-10 col-sm-8">
          <h1 class = "h1">Viva experiênciais inesquecíveis</h1>
          <h3 class = "h4">Reserve já o seu lugar no nosso teatro</h3>
          <button class = "btn btn-warning btn-lg" type="button" name="button">Reserve já</button>
        </div>
        <div class="col-1 col-sm-2"></div>
      </div>
    </div>




    <script type="text/javascript">
      <?php require "external/jquery.js"?>
    </script>
    <script type="text/javascript">
      <?php require "external/bootstrap/js/bootstrap.bundle.js"?>
    </script>
    <script type="text/javascript">
      <?php require "scripts/homepage.js"?>
    </script>
  </body>
</html>
