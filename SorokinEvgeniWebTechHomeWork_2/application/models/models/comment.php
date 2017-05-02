<?php
  namespace models\models;
  use models\database\DatabaseWorker;
  use \PDO;

  class Comment extends DatabaseWorker
  {
    protected $tableName = 'comments';
    protected $id_field = 'comment_id';
    protected $fieldNames = ['user_id', 'content', 'article_id', 'updated_at'];
  }
