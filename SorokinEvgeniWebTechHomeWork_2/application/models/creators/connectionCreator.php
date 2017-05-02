<?php

namespace models\creators;
use \PDO;

class connectionCreator
{
  protected $m_pdo;
  public function CreateConnection( $dbname, $host = 'localhost', $user = 'root', $password = 'root')
  {
    if($this->m_pdo === null)
    {
      try
      {
        $this->m_pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      }
      catch (PDOException $e)
      {
        die('Подключение не удалось: ' . $e->getMessage());
      }
      return $this->m_pdo;
    }
  }
}
