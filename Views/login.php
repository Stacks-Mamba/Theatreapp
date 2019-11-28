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
      <?php  require "style/login.css"; ?>
    </style>
    <style>
      <?php  require "style/font.css"; ?>
    </style>
  </head>
  <body>
    <div id = "main" class="container-fluid">
      <div class="row">
        <div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
          <form id = "form">
            <div id="form-header">
              <h4 class="h4">Login</h4>
              <h5 class = "h6 text-muted">Use a sua conta</h5>
            </div>
            <div class = "form-group">
              <label for = "username">Nome de utilizador</label>
              <input class = "form-control" id = "username"type="text" placeholder="Nome de utilizador"/>
              <div class="invalid-feedback">
              </div>
            </div>
            <div class = "form-group">
              <label for = "password">Palavra-passe</label>
              <input class = "form-control" id = "password"type="password" placeholder="Palavra-passe"/>
              <div class="invalid-feedback">
              </div>
            </div>
            <button id = "sendBtn" class = "btn btn-primary"type="button" name="button">Entrar</button>
          </form>
        </div>
        <div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
      </div>
    </div>

    <script type="text/javascript">
      <?php require "external/jquery.js"?>
    </script>
    <script type="text/javascript">
      <?php require "external/bootstrap/js/bootstrap.bundle.js"?>
    </script>
    <script type="text/javascript">
      <?php require "scripts/login.js"?>
    </script>
  </body>
</html>
