<?php
  namespace models\models;
  use models\database\DatabaseWorker;
  use \PDO;

  class User extends DatabaseWorker
  {
    protected $tableName = 'users';
    protected $id_field = 'user_id';
    protected $fieldNames = ['name', 'email', 'psswrd'];

    public function getUserByEmail($email)
    {
      $data = $this->getRecordsByFieldValue('email', $email);
      if(!is_null($data))
      {
        return $data[0];
      }
      return NULL;
    }
  }
