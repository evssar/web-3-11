<?php
  namespace models\models;
  use models\database\databaseWorker;
  use \PDO;

  class Comment extends databaseWorker
  {
    protected $tableName = 'comments';
    protected $id_field = 'comment_id';
    protected $fieldNames = ['user_id', 'content', 'article_id', 'updated_at'];
  }
