<?php
//Caminho absoluto até o ficheiro do projecto
define("BASE_PATH",$_SERVER["DOCUMENT_ROOT"]."/TheatreApp/");
//Importando classes
require "models/Lugar.php";
require "models/LugarBalcao.php";
require "models/LugarPlateia.php";
require "core/Database.php";
require "models/LugarMapper.php";
require "models/UserMapper.php";
require "controllers/DashboardController.php";
require "controllers/LugarController.php";
require "controllers/GestaoController.php";
/*Front controller que lida com todos os pedidos. Analisa a uri e separa em partes
para poder atender o pedido*/
/*Valores padrão*/
$valid = false;
$controller = null;
$request = null;

$uri =  explode("/",parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH));
if(count($uri)==3){
  if($uri[2]=="index.php"){
    header("location: http://127.0.0.1/TheatreApp/views/login.php",true,303);
  }
  else{
    header("HTTP/1.1 404 Not Found");
    echo "<h1>Not Found</h1>";
  }
}
else if(count($uri)==5){
  //Decomposição do uri
  $controller = $uri[3];
  $request = $uri[4];
  $valid = true;

  if($controller == "dashboard" and $valid){
    $controller = new DashboardController();
    $controller->handleRequest($request);
  }
  else if($controller == "lugares" and $valid){
    $controller = new LugarController();
    $controller->handleRequest($request);
  }
  else if($controller == "gestao" and $valid){
    $controller = new GestaoController();
    $controller->handleRequest($request);
  }
  else{
    header("HTTP/1.1 400 Bad Request");
  }
}
else{
  header("HTTP/1.1 404 Not Found");
  echo "<h1>Not Found</h1>";
}
?>
