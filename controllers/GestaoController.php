<?php
class GestaoController{
  public function handleRequest($request){
    $lm = new LugarMapper();
    switch($request){
      case "show":
        require BASE_PATH."Views/gestao.php";
        break;
      case "get":
        if($_SERVER["REQUEST_METHOD"]=="GET"){
          $result = Lugar::loadLugar($_GET,$lm);
          if($result!=null){
            $response = array("result"=>1,"tipo"=>get_class($result),"data"=>$result->toJSON());
          }
          else{
            $response = array("result"=>0,"data"=>null);
          }
          echo json_encode($response);
        }
        else{
          header("HTTP/1.1 405 Method Not Allowed");
        }
        break;
      case "delete":
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $result = Lugar::removeLugar($_POST,$lm);
          if($result!=null){
            $response = array("result"=>1);
          }
          else{
            $response = array("result"=>0);
          }
          echo json_encode($response);
        }
        else{
          header("HTTP/1.1 405 Method Not Allowed");
        }
        break;
      case "update":
        if($_SERVER["REQUEST_METHOD"]=="POST"){
          $result = Lugar::changeLugar($_POST,$lm);
          if($result!=null){
            $response = array("result"=>1);
          }
          else{
            $response = array("result"=>0);
          }
          echo json_encode($response);
        }
        else{
          header("HTTP/1.1 405 Method Not Allowed");
        }
        break;
    }
  }
}


?>
