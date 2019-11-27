<?php

//Classe que representa um lugar de balcão
//Faz extensão da classe base lugar
class LugarPlateia extends Lugar{


  private $seccao;
  private $protocolar;

  public function __construct($fila,$lugar,$vendido,$seccao,$protocolar){
    parent::__construct($fila,$lugar,Lugar::getEstado($vendido));
    $this->seccao = $seccao;
    $this->protocolar = Lugar::getEstado($protocolar);
  }

  public function getSeccao(){
    return $this->seccao;
  }

  public function isProtocolar(){
     if($this->protocolar == "não"){
       return 0;
     }
     return 1;
  }

  //Calcular o preco do lugar
  public function getPreco(){
    if($this->protocolar == "sim"){
      return 30.0;
    }
    return 20.0;
  }

  public static function getProtocolaresIncome($array){
    $protocolares = 0;
    foreach($array as $lugar){
      if((bool)$lugar->isProtocolar() and (bool)$lugar->isVendido()){
        $protocolares += $lugar->getPreco();
      }
    }
    return $protocolares;
  }

  public static function getNumProtocolares($array){
    $protocolares = 0;
    foreach($array as $lugar){
      if((bool)$lugar->isProtocolar() and (bool)$lugar->isVendido()){
        $protocolares += 1;
      }
    }
    return $protocolares;
  }

  public function getLugarInfo(){
    $tipo = Lugar::getTipoLugar($this);
    return parent::getLugarInfo()."<td>$this->seccao</td>\n<td>$tipo</td>\n</tr>";
  }

  public function toJSON(){
    return array("fila" => $this->getFila(),"lugar" => $this->getLugar(),"seccao"=>$this->seccao);
  }
}

?>
