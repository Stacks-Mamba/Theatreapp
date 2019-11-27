<?php

//Controller que lida com as requisições do dashboard
class DashboardController{
  public function handleRequest($request){
    switch($request){
      case "show":
        $content = Lugar::getLugarData();
        require BASE_PATH."Views/dashboard.php";
        break;
    }
  }
}

?>
