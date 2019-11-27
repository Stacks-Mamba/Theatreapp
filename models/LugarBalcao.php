<?php
//Classe que representa um lugar de balcão
//Faz extensão da classe base lugar
class LugarBalcao extends Lugar{


  private $numBalcao;
  private $fumador;

  public function __construct($fila,$lugar,$vendido,$numBalcao,$fumador){
    parent::__construct($fila,$lugar,Lugar::getEstado($vendido));
    $this->numBalcao = $numBalcao;
    $this->fumador = Lugar::getEstado($fumador);
  }

  public function getNumBalcao(){
    return $this->numBalcao;
  }

  public function isFumador(){
    if($this->fumador == "não"){
      return 0;
    }
    return 1;
  }

  public static function getNumFumadores($array){
    $fumadores= 0;
    foreach($array as $lugar){
      if((bool)$lugar->isFumador() and (bool)$lugar->isVendido()){
        $fumadores += 1;
      }
    }
    return $fumadores;
  }


  public function getPreco(){
    if ($this->fumador == "sim"){
      return (0.5*$this->getFila())+5;
    }
    return 0.5 * $this->getFila();
  }



  public function getLugarInfo(){
    $tipo = Lugar::getTipoLugar($this);
    return parent::getLugarInfo()."<td>$this->numBalcao</td>\n<td>$tipo</td>\n</tr>";
  }

  public function getSaleInfo(){
    $preco = $this->getPreco();
    return "<tr>\n<td>{$this->getFila()}</td>\n<td>{$this->getLugar()}</td>\n<td>{$this->fumador}</td>\n<td>{$preco} AOA</td>\n</tr>";
  }

  public function toJSON(){
    return array("fila" => $this->getFila(),"lugar" => $this->getLugar(),"balcao"=>$this->numBalcao);
  }
}

?>
