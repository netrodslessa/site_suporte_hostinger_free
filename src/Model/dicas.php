<?php

class Dicas
{
  public static function selectAllI()
  {
    $con = Connetion::getConn();

    $sql = 'SELECT * FROM dicas';
    $sql = $con->prepare($sql);
    $sql->execute();

    $resultado = array();
    while ($row = $sql ->fetchObject('dicas')){
      $resultado[] = $row;
    }
    // tratando caso esteja vazio
    if(!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }
 
}
