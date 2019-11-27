<?php
/*A classe LugarMapper serve como intermediário entre a classe lugar e a base de dados
é usada para manter coesão da classe lugar e que classe lugar tenha muitas responsabilidade
*/
class LugarMapper{
  public static $BALCAO = "lugarbalcao";
  public static $PLATEIA = "lugarplateia";

  /*Queries que serão usadas */
  public static $GET_ALL= "SELECT * FROM %s ORDER BY numFila";
  public static $GET_BY_ID = "SELECT * FROM %s WHERE numFila=%u AND numLugar=%u";
  public static $INSERT = "INSERT INTO %s(numFila,numLugar,vendido,%s,%s) VALUES(%u,%u,%u,'%s',%u)";
  public static $DELETE = "DELETE FROM %s WHERE numFila=%u AND numLugar=%u";
  public static $UPDATE = "UPDATE %s SET vendido=%u, %s=%u WHERE numFila=%u AND numLugar=%u";

  //Função usada para analisar os resultados e obter objectos
  public static function getObjects($result,$table){
    $rows = $result->num_rows;
    if($rows>1){
      $lugares = [];
      while($row = $result->fetch_assoc()){
        //Instanciar o resultado e adiciona-ló ao fim do array
        switch($table){
          case LugarMapper::$PLATEIA:
            $obj = new LugarPlateia($row["numFila"],$row["numLugar"],
            $row["vendido"],$row["seccao"],$row["protocolar"]);
            $lugares[] = $obj;
            break;
          case LugarMapper::$BALCAO:
            $obj = new LugarBalcao($row["numFila"],$row["numLugar"],
            $row["vendido"],$row["numBalcao"],$row["fumador"]);
            $lugares[] = $obj;
            break;
        }
      }
      return $lugares;
    }
    else if($rows==1){
      $row = $result->fetch_assoc();
      switch($table){
        case LugarMapper::$PLATEIA:
          $obj = new LugarPlateia($row["numFila"],$row["numLugar"],
          $row["vendido"],$row["seccao"],$row["protocolar"]);
          return $obj;
          break;
        case LugarMapper::$BALCAO:
          $obj = new LugarBalcao($row["numFila"],$row["numLugar"],
          $row["vendido"],$row["numBalcao"],$row["fumador"]);
          return $obj;
          break;
      }
    }
    else{
      return null;
    }
  }

  public function getAllLugares($table){
    $lugares = [];
    //Instanciar objecto da classe base de dados
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn() and ($table==LugarMapper::$BALCAO or $table==LugarMapper::$PLATEIA)){
      $conn = $db->getConn();
      //Formatar a string da query com base na tabela que se quer
      $query = sprintf(LugarMapper::$GET_ALL,$table);
      $result = $conn->query($query);
      $db->closeConn();
      //Obter objectos a partir do resultado
      return LugarMapper::getObjects($result,$table);
    }
    else{
      return null;
    }
  }

  public function getLugarById($table,$id){
    //Instanciar objecto da classe base de dados
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn() and ($table==LugarMapper::$BALCAO or $table==LugarMapper::$PLATEIA)){
      $conn = $db->getConn();
      //Formatar a string da query com base na tabela que se quer
      $query = sprintf(LugarMapper::$GET_BY_ID,$table,$id["fila"],$id["lugar"]);
      $result = $conn->query($query);
      $db->closeConn();
      //Obter objectos a partir do resultado
      return LugarMapper::getObjects($result,$table);
    }
    else{
      return null;
    }
  }


  //Método de inserção. Retorna True se a inserção for bem sucedida.
  public function insertLugar($table,$lugar){
    //Instanciar objecto da classe base de dados
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn() and ($table==LugarMapper::$BALCAO or $table==LugarMapper::$PLATEIA)){
      $conn = $db->getConn();
      //Formatar string da query com base na tabela escolhida
      $query = "";
      switch($table){
        case LugarMapper::$PLATEIA:
          $query = sprintf(LugarMapper::$INSERT,$table,"seccao","protocolar",
          $lugar->getFila(),$lugar->getLugar(),$lugar->isVendido(),
          $conn->real_escape_string($lugar->getSeccao()),$lugar->isProtocolar());
          break;
        case LugarMapper::$BALCAO:
          $query = sprintf(LugarMapper::$INSERT,$table,"numBalcao","fumador",
          $lugar->getFila(),$lugar->getLugar(),$lugar->isVendido(),
          $conn->real_escape_string($lugar->getNumBalcao()),$lugar->isFumador());
          break;
      }
      $result = $conn->query($query);
      //Close the connection
      $db->closeConn();
      return $result;
    }
    else{
      return false;
    }
  }

  //Eliminar objecto da base de dados
  public function deleteLugarById($table,$id){
    //Instanciar objecto da classe base de dados
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn() and ($table==LugarMapper::$BALCAO or $table==LugarMapper::$PLATEIA)){
      $conn = $db->getConn();
      //Formatar a string da query com base na tabela que se quer
      $query = sprintf(LugarMapper::$DELETE,$table,$id["fila"],$id["lugar"]);
      $result = $conn->query($query);
      $db->closeConn();
      //Obter objectos a partir do resultado
      return $result;
    }
    else{
      return false;
    }
  }


  //Actualizar lugar
  public function updateLugarById($table,$data,$id){
    $db = Database::getDatabase();
    //Tentar abrir conexão com a base de dados
    if($db->openConn() and ($table==LugarMapper::$BALCAO or $table==LugarMapper::$PLATEIA)){
      $conn = $db->getConn();
      //Formatar a string da query com base na tabela que se quer
      if($table==LugarMapper::$BALCAO){
        $query = sprintf(LugarMapper::$UPDATE,$table,$data["vendido"],"fumador",$data["fumador"],$id["fila"],$id["lugar"]);
      }
      else {
        $query = sprintf(LugarMapper::$UPDATE,$table,$data["vendido"],"protocolar",$data["protocolar"],$id["fila"],$id["lugar"]);
      }
      $result = $conn->query($query);
      $db->closeConn();
      //Obter objectos a partir do resultado
      return $result;
    }
    else{
      return false;
    }
  }
}

/*function main(){
  $id = array("fila"=>1,"lugar"=>1);
  LugarMapper::getLugarById()
}*/

?>
