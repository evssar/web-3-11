<?php
  namespace models\models;
  use models\database\DatabaseWorker;
  use \PDO;

  class Article extends DatabaseWorker
  {
    protected $tableName = 'articles';
    protected $id_field = 'article_id';
    protected $fieldNames = ['title', 'content', 'user_id', 'updated_at'];
  }
