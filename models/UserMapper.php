<?php
class UserMapper{
  public static $GET_PRIVELEGES = "SELECT privilege FROM account WHERE username='%s' AND passphrase='%s'";
  public function getUserPrivileges($credentials){
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn()){
      $conn = $db->getConn();
      //Formatar a string da query com base na tabela que se quer
      $query = sprintf(UserMapper::$GET_PRIVELEGES,$credentials["username"],$credentials["password"]);
      //Prepare statement
      $stmt = $conn->prepare($query);
      //Execute statement
      $stmt->execute();
      $result = $stmt->get_result();
      $db->closeConn();
      if($result->num_rows==0){
        return null;
      }
      //Obter objectos a partir do resultado
      return $result->fetch_assoc()["privilege"];
    }
    else{
      return null;
    }
  }
}


/*$creds = array("username"=>"admin","password"=>"root");
$lm = new UserMapper();

var_dump($lm->getUserPrivileges($creds));*/



?>
