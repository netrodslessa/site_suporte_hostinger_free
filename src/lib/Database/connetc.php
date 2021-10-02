<?php

abstract class Connetion
{
  private static $conn;
  public static function getConn()
  {
    if (self::$conn == null) {
      self::$conn = new PDO('mysql: host=localhost; dbname=timetec;', 'root', '_43690');
    }
    return self::$conn;
  }
}
