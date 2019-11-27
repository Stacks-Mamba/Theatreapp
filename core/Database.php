<?php

//Classe usada para estabelecer a conexão com a base de dados

class Database{

  private $db_server;
  private $user_name;
  private $password;
  private $conn;

  public static $db = null;

  private function __construct($db_server,$dbName,$user_name,$password){
      //Inicialização dos dados
      $this->dbServer = $db_server;
      $this->dbName = $dbName;
      $this->user_name = $user_name;
      $this->password = $password;
  }

  public static function getDatabase(){
    if(Database::$db==null){
      Database::$db = new Database("localhost","theatre","root","");
      return Database::$db;
    }
    return Database::$db;
  }

  //Buscar objecto de conexão para fazer queries
  public function getConn(){
    return $this->conn;
  }

  //Método que serve para abrir uma conexão com a BD. Retorna true se foi bem sucedido.
  public function openConn(){
    $this->conn = new mysqli($this->dbServer,$this->user_name,$this->password,$this->dbName);
    if($this->conn->connect_error){
      return false;
    }
    return true;
  }

  //Método para fechar uma conexão
  public function closeConn(){
    $this->conn->close();
  }
}
?>
