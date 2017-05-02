<?php

namespace models\creators;
use \PDO;

class ConnectionCreator
{
  static protected $m_pdo = NULL;
  static public function CreateConnection( $dbname, $host = 'localhost', $user = 'root', $password = 'root')
  {
    if(self::$m_pdo === NULL)
    {
      try
      {
        self::$m_pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      }
      catch (PDOException $e)
      {
        die('Подключение не удалось: ' . $e->getMessage());
        return NULL;
      }
    }
    return self::$m_pdo;
  }
}
