<?php
//Classe abstracta que serve de base para as outras classes
abstract class Lugar{

  private $fila;
  private $lugar;
  private $vendido;


  public function __construct($fila,$lugar,$vendido){
    $this->fila = $fila;
    $this->lugar = $lugar;
    $this->vendido = $vendido;
  }

  public function getLugar(){
    return $this->lugar;
  }

  public function getFila(){
    return $this->fila;
  }

  public function isVendido(){
    if($this->vendido == "não"){
      return 0;
    }
    return 1;
  }

  public static function getEstado($value){
    if($value==0){
      return "não";
    }
    return "sim";
  }

  public abstract function getPreco();

  public static function getIncome($array){
    $total = 0;
    foreach($array as $lugar){
      $total += $lugar->getPreco();
    }
    return $total;
  }

  public static function getLugaresVendidos($array){
    $data = [];
    foreach($array as $lugar){
      if((bool)$lugar->isVendido()){
        $data[] = $lugar;
      }
    }
    return $data;
  }


  public static function getTipoLugar($seat){
    switch(get_class($seat)){
      case "LugarBalcao":
        if($seat->isFumador()){
          return "Balcão (fumador)";
        }
        return "Balcão (Não fumador)";
        break;
      case "LugarPlateia":
        if($seat->isProtocolar()){
          return "Plateia (protocolar)";
        }
        return "Plateia (Não protocolar)";
        break;
    }
  }

  public function getLugarInfo(){
    return "<tr><td>$this->fila</td>\n<td>$this->lugar</td>\n<td>$this->vendido</td>\n";
  }



  public static function getLugarnumbers($array){
    //Lugares vendidos
    $data = [];
    $vendidos = 0;
    foreach($array as $lugar){
      if((bool)$lugar->isVendido()){
        $vendidos += 1;
      }
    }
    $data["vendidos"] = $vendidos;
    //Lugares disponíveis
    $data["disponiveis"] = count($array) - $vendidos;
    return $data;
  }

  //Método para buscar diversas informações sobre os lugares
  public static function getLugarData(){
    $lm = new LugarMapper();
    $data = [];
    $balcao = $lm->getAllLugares(LugarMapper::$BALCAO);
    $plateia = $lm->getAllLugares(LugarMapper::$PLATEIA);
    $lugares = array_merge($balcao,$plateia);
    //Lugares vendidos e lugares disponíveis
    $result = Lugar::getLugarNumbers($lugares);
    $data["vendidos"] = $result["vendidos"];
    $data["disponiveis"] = $result["disponiveis"];
    //Total de dinheiro arrecadado
    $data["arrecadado"] = Lugar::getIncome($lugares);
    //Informações sobre os lugares de plateia
    $percentagem =(float) (Lugar::getLugarNumbers($plateia)["vendidos"])/count($plateia);
    $data["lugares_plateia_vendidos"] = round((float) $percentagem*100,2);
    $data["lugares_protocolares"] = LugarPlateia::getNumProtocolares($plateia);
    $data["lugares_protocolares_income"] = LugarPlateia::getProtocolaresIncome($plateia);
    //Informações sobre os de balcão
    $data["lugares_balcao_vendidos"] = Lugar::getLugarNumbers($balcao)["vendidos"];
    $data["lugares_fumadores"] = LugarBalcao::getNumFumadores($balcao);
    $data["lugares_balcao_data"] = Lugar::getLugaresVendidos($balcao);
    return $data;
  }

  //Método para guardar um lugar com base em dados de formulário
  public static function saveLugar($form,$lm){

    //Analisar o tipo
    $obj = null;
    $table = "";
    switch($form["tipo"]){
      case 1:
        $obj = new LugarPlateia(intval($form["fila"]),intval($form["lugar"]),intval($form["reservado"]),$form["seccao_balcao"],0);
        $table = LugarMapper::$PLATEIA;
        break;
      case 2:
        $obj = new LugarPlateia(intval($form["fila"]),intval($form["lugar"]),intval($form["reservado"]),$form["seccao_balcao"],1);
        $table = LugarMapper::$PLATEIA;
        break;
      case 3:
        $obj = new LugarBalcao(intval($form["fila"]),intval($form["lugar"]),intval($form["reservado"]),$form["seccao_balcao"],1);
        $table = LugarMapper::$BALCAO;
        break;
      case 4:
        $obj = new LugarBalcao(intval($form["fila"]),intval($form["lugar"]),intval($form["reservado"]),$form["seccao_balcao"],0);
        $table = LugarMapper::$BALCAO;
        break;
    }
    return array("success"=>$lm->insertLugar($table,$obj),"data"=>$obj->getLugarInfo());
  }

  //Obter um determinado lugar pelo id e tipo
  public static function loadLugar($data,$lm){
    $table = "";
    switch(intval($data["tipo"])){
      case 1:
        $table = LugarMapper::$PLATEIA;
        break;
      case 2:
        $table = LugarMapper::$BALCAO;
        break;
    }
    $id = array("fila"=>intval($data["fila"]),"lugar"=>intval($data["lugar"]));
    return $lm->getLugarById($table,$id);
  }

  //Apagar um lugar pelo id
  public static function removeLugar($data,$lm){
    $table = "";
    switch(intval($data["tipo"])){
      case 1:
        $table = LugarMapper::$PLATEIA;
        break;
      case 2:
        $table = LugarMapper::$BALCAO;
        break;
    }
    $id = array("fila"=>intval($data["fila"]),"lugar"=>intval($data["lugar"]));
    return $lm->deleteLugarById($table,$id);
  }

  //Actualizar um campo da tabela
  public static function changeLugar($data,$lm){
    $table = "";
    switch(intval($data["tipo"])){
      case 1:
        $table = LugarMapper::$PLATEIA;
        $request_data = array("vendido"=>intval($data["vendido"]),
        "protocolar"=>intval($data["subtipo"]));
        break;
      case 2:
        $table = LugarMapper::$BALCAO;
        $request_data = array("vendido"=>intval($data["vendido"]),
        "fumador"=>intval($data["subtipo"]));
        break;
    }
    $id = array("fila"=>intval($data["fila"]),"lugar"=>intval($data["lugar"]));
    return $lm->updateLugarById($table,$request_data,$id);
  }
}

?>
