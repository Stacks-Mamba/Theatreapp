<?php
require "LugarMapper.php";
$lm = new LugarMapper();
if(isset($_POST["Nome"])){

  echo json_encode(array("sobrenome"=>$_POST["Nome"]));
}
?>
