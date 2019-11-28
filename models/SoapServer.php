<?php
require "../core/nusoap.php";
require "../core/Database.php";
require "UserMapper.php";

function getUserPrivileges($user,$password){
  $um = new UserMapper();
  $creds = array("username"=>$user,"password"=>$password);
  $result = $um->getUserPrivileges($creds);
  if(!$result){
    return -1;
  }
  return $result;
}

/*$data = getUserPrivileges("admin","root");
echo $data;*/
$server = new nusoap_server();
$server->configureWSDL("loginServer","urn:login");
$server->register("getUserPrivileges",array('user' => 'xsd:string','password'=>'xsd:string'),
array('return' => 'xsd:integer'),
'urn:login',false,"rpc","encoded","getting user privileges");
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA)?$HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);




?>
