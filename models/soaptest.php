<?php
require "../core/nusoap.php";
require "../core/Database.php";
require "UserMapper.php";
$options = array(
// Dev
'soap_version'=>SOAP_1_2,
'exceptions'=>true,
'trace'=>1,
'cache_wsdl'=>WSDL_CACHE_NONE,
'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
// Credentials
'user' => 'admin',
'password' => 'root'
);
$client = new nusoap_client("http://localhost/TheatreApp/models/SoapServer.php?wsdl",$options);
$result = $client->call( "getUserPrivileges",array());
$privileges = $client;
var_dump($privileges);
//var_dump($client->request);
//var_dump($client->response);




?>
