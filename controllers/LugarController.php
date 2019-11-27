<?php
//Controller que lida com as requisições do dashboard
class LugarController{
  public function handleRequest($request){
    $lm = new LugarMapper();
    switch($request){
      case "show":
        //Buscar todos os lugares gravados
        $content = array_merge($lm->getAllLugares(LugarMapper::$PLATEIA),$lm->getAllLugares(LugarMapper::$BALCAO));
        require BASE_PATH."Views/lugares.php";
        break;

      //Requisição assíncrona para adicionar o usuário
      case "add":
        if($_SERVER["REQUEST_METHOD"]=="POST"){

          $result = Lugar::saveLugar($_POST,$lm);
          if($result["success"]){
            //Actualizar tabela
            $response = array("result"=>1,"data" => $result["data"]);
            echo json_encode($response);
          }
          else{
            $response = array("result"=>0,"data"=>null);
            echo json_encode($response);
          }
        }
        else{
          header("HTTP/1.1 405 Method Not Allowed");
        }
    }
  }
}

?>
