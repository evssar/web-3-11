<?php

namespace models\database;
use models\creators\connectionCreator;
use \PDO;

class databaseWorker
{
  protected $m_dbName = 'blog';
  protected $m_host = 'localhost';
  protected $m_user = 'root';
  protected $m_password = 'root';
  protected $tableName = '';
  protected $id_field = '';
  protected $fieldNames = array();
  protected $data = array();
  protected $m_conn;
  public $id;

  public function __construct()
  {
    $connCreator = new connectionCreator();
    $this->m_conn = $connCreator->CreateConnection($this->m_dbName, $this->m_host, $this->m_user, $this->m_password);
  }

  public function assignData($data) {
    foreach($this->fieldNames as $fld)
    {
      $this->data[$fld] = $data[$fld];
    }
    $this->id = $data[$this->id_field];
  }

  public function asArray() {
    $data  = Array();
    $data[$this->id_field] = $this->id;
    foreach ($this->fieldNames as $field)
    {
      $data[$field] = $this->data[$field];
    }
    return $data;
  }

  protected function setPDO($allowed, &$values, $source = array())
  {
    $set = '';
    $values = array();
    if (!$source) $source = &$_POST;
      foreach ($allowed as $field)
      {
        if (isset($source[$field]))
        {
          $set.="`".$field."`". "=:$field, ";
          $values[$field] = $source[$field];
        }
      }
    if($set == '')
    {
      print "Field $field is not set in source!";
      exit(1);
    }
    return substr($set, 0, -2);
  }

  public function insertRecord($source = array())
  {
    $valuesArr = array();
    $sql = $sql = "INSERT INTO ".$this->tableName." SET ".$this->setPDO($this->fieldNames,$valuesArr,$source);
    echo $sql;
    $command = $this->m_conn->prepare($sql);
    $command->execute($valuesArr);
  }

  public function updateRecordById($id, $source = array()) {
    $valuesArr = array();
    $sql = 'UPDATE '.$this->tableName.' SET '.$this->setPDO($this->fieldNames,$valuesArr,$source).' WHERE `'.$this->id_field.'`=:'.$this->id_field;
    $command = $this->m_conn->prepare($sql);
    $valuesArr[$this->id_field]=$id;
    $command->execute($valuesArr);
    $this->getRecordById($id);
  }

  public function getRecordById($id)
  {
    $sql = implode(',', $this->fieldNames).','.$this->id_field;
    $sql = "SELECT ". $sql ." FROM ". $this->tableName." WHERE ".$this->id_field."=".$id;
    $result = $this->m_conn->query($sql);
    if($data = $result->fetch(PDO::FETCH_LAZY))
    {
      $this->assignData($data);
    }
  }

  public function getRecordsByFieldValue($field, $value)
  {
    $allowed = false;
    foreach ($this->fieldNames as $fld)
    {
      if($fld == $field) $allowed = true;
    }
    if($allowed)
    {
      $sql = "SELECT * FROM ".$this->tableName." WHERE `".$field."`='".$value."'";
      $result = $this->m_conn->query($sql);
      if ($result->rowCount() != 0)
      {
        $return_array = array();
        $current_class = get_class($this);
        while($row = $result->fetch(PDO::FETCH_LAZY))
        {
          $current_object = new $current_class();
          $current_object->assignData($row);
          $return_array[] = $current_object;
        }
        return $return_array;
      }
    }
    return NULL;
  }

  public function getAllRecords()
  {
    $sql = "SELECT * FROM ".$this->tableName;
    $result = $this->m_conn->query($sql);
    if ($result->rowCount() != 0)
    {
      $return_array = array();
      $current_class = get_class($this);
      while($row = $result->fetch(PDO::FETCH_LAZY))
      {
        $current_object = new $current_class();
        $current_object->assignData($row);
        $return_array[] = $current_object;
      }
      return $return_array;
    }
    return NULL;
  }

  public function deleteRecordById($id)
  {
    $sql = "DELETE FROM ".$this->tableName." WHERE `".$this->id_field."`=".$id;
    $result = $this->m_conn->query($sql);
  }

  public function saveDatabase() {
    if ($this->id == '')
    {
      $this->insertRecord($this->data);
    }
    else
    {
      $this->updateRecordById($this->id);
    }
  }

  public function __get($field) {
    if (isset($this->data[$field]))
    {
      return $this->data[$field];
    }
    else
    {
      return NULL;
    }
  }

  public function __set($field, $value)
  {
    if(isset($this->fieldNames[$field]))
      $this->data[$field] = $value;
  }
}
