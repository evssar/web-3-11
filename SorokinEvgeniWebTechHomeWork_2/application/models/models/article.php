<?php
  namespace models\models;
  use models\database\databaseWorker;
  use \PDO;

  class Article extends databaseWorker
  {
    protected $tableName = 'articles';
    protected $id_field = 'article_id';
    protected $fieldNames = ['title', 'content', 'user_id', 'updated_at'];
  }
