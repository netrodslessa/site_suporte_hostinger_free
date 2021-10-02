<?php
class Postagem
{
  public static function selectAllI()
  {
    $con = Connetion::getConn();

    $sql = 'SELECT * FROM links';
    $sql = $con->prepare($sql);
    $sql->execute();

    $resultado = array();
    while ($row = $sql ->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    // tratando caso esteja vazio
    if(!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }
  public static function selecionaPorId($idPost){
    $con = Connetion::getConn();

    $sql = "SELECT * FROM dicas WHERE id = :id";
    $sql = $con->prepare($sql);
    $sql -> bindValue(':id', $idPost, PDO::PARAM_INT);
    $sql -> execute();

    $resultado = $sql->fetchObject('Postagem');

    if (!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }
  public static function selecDicas()
  {
    $con = Connetion::getConn();

    $sql = 'SELECT * FROM dicas';
    $sql = $con->prepare($sql);
    $sql->execute();

    $resultado = array();
    while ($row = $sql ->fetchObject('Postagem')){
      $resultado[] = $row;
    }
    // tratando caso esteja vazio
    if(!$resultado){
      throw new Exception("Não foi encontrado nenhum registro!");
    }
    return $resultado;
  }


}
