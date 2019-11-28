<?php
require "../core/Database.php";
require "../models/UserMapper.php";
//Controller que lida com as requisições do dashboard
class LoginController{

  public function verifyUser(){
    $mapper = new UserMapper();
    if($_SERVER["REQUEST_METHOD"]=="POST"){
      $data = array("username"=>$_POST["user"],"password"=>$_POST["password"]);
      $result = $mapper->getUserPrivileges($data);
      if(intval($result) == 1){
        $response = "http://127.0.0.1/TheatreApp/index.php/dashboard/show";
      }
      else if(intval($result)==2){
        $response = "http://127.0.0.1/TheatreApp/Views/homepage.php";
      }
      else{
        $response = 0;
      }
      echo json_encode(array("result"=>$response));
    }
  }

}


$controller = new LoginController();
$controller->verifyUser();


?>
