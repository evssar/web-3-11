<?php
  namespace controllers;
  use models\models\Article;
  use models\models\User;
  use models\models\Comment;
  use utils\Auth;

  class ArticleController extends Controller
  {
    public function user_articlesAction()
    {
      $user = Auth::user();
      if ($user === NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      $article = new Article();
      $articles = $article->getRecordsByFieldValue('user_id',$user->id);
      if(!is_null($articles))
      {
        $fieldNames = ['title', 'updated_at'];
        $articles_data = array();
        $article_data = array();
        $ids = array();
        foreach ($articles as $article)
        {
          foreach ($fieldNames as $field)
          {
            $article_data[$field] = $article->$field;
          }
          $ids[] = $article->id;
          $articles_data[] = $article_data;
        }
        $this->view->ids = $ids;
        $this->view->fields = ['Заголовок', 'Дата изменения'];
        $this->view->articles = $articles_data;
      }
     $this->view->header = "Мот статьи";
     $this->view->render('article/user_articles', 'main_template', 'left_menu_template');
    }

    public function delete_articleAction()
    {
      $user = Auth::user();
      if ($user === NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      if(isset($_POST['article_id']))
      {
        $article = new Article();
        $article->deleteRecordById($_POST['article_id']);
        header("Location: /?c=article&a=user_articles");
        exit;
      }
    }

    public function edit_articleAction()
    {
      $user = Auth::user();
      if ($user === NULL && !isset($_POST['article_id']))
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      $article = new Article();
      if(isset($_POST['title']) && isset($_POST['content']))
      {
        $_POST['user_id'] = $user->id;
        $article->updateRecordById($_POST['article_id'], $_POST);
        header("Location: /?c=article&a=user_articles");
        exit;
      }
      $article->getRecordById($_POST['article_id']);
      $this->view->title = $article->title;
      $this->view->content = $article->content;
      $this->view->article_id = $_POST['article_id'];
      $this->view->render('article/edit_article', 'main_template', 'left_menu_template');
    }

    public function add_articleAction()
    {
      $user = Auth::user();
      if ($user === NULL && !isset($_POST['article_id']))
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      $article = new Article();
      if(isset($_POST['title']) && isset($_POST['content']))
      {
        $_POST['user_id'] = $user->id;
        $article->insertRecord($_POST);
        header("Location: /?c=article&a=user_articles");
        exit;
      }
      $this->view->render('article/edit_article', 'main_template', 'left_menu_template');
    }

    public function show_articleAction()
    {
      if(isset($_REQUEST['article_id']))
      {
        $article = new Article();
        $article->getRecordById($_REQUEST['article_id']);
        $this->view->title = $article->title;
        $this->view->content = $article->content;
        $user = new User();
        $user->getRecordById($article->user_id);
        $this->view->user_name = $user->name;
        $this->view->date = $article->updated_at;
        $this->view->article_id = $_REQUEST['article_id'];
        $left_menu = 'left_menu_template';

        $comment = new Comment();
        $comments = $comment->getRecordsByFieldValue('article_id', $_REQUEST['article_id']);
        if(!is_null($comments))
        {
          $comments_array = array();
          $comment_info = array();
          foreach ($comments as $comment)
          {
            $user->getRecordById($comment->user_id);
            $comment_info['author'] = $user->name;
            $comment_info['content'] = $comment->content;
            $comment_info['date'] = $comment->updated_at;
            $comments_array[] = $comment_info;
          }
        }
        if(isset($comments_array)) $this->view->comments = $comments_array;
        if (is_null(Auth::user())) $left_menu = NULL;
        $this->view->render('article/show_article', 'main_template', $left_menu);
      }
      else
      {
        header("Location: /");
        exit;
      }
   }

     public function articles_listAction()
     {
       $article = new Article();
       $articles = $article->getAllRecords();
       if(!is_null($articles))
       {
         $fieldNames = ['title', 'updated_at'];
         $articles_data = array();
         $article_data = array();
         $ids = array();
         foreach ($articles as $article)
         {
           foreach ($fieldNames as $field)
           {
             $article_data[$field] = $article->$field;
           }
           $ids[] = $article->id;
           $articles_data[] = $article_data;
         }
         $this->view->ids = $ids;
         $this->view->fields = ['Заголовок', 'Дата изменения'];
         $this->view->articles = $articles_data;
       }
      $this->view->header = "Все публикации";
      $left_menu = 'left_menu_template';
      if (is_null(Auth::user())) $left_menu = NULL;
      $this->view->render('article/articles_list', 'main_template', $left_menu);
     }

   public function add_commentAction()
   {
     $user = Auth::user();
     if ($user === NULL)
     {
       header("Location: /?c=page&a=index");
       exit;
     }
     if(isset($_REQUEST['article_id']))
     {
       if(isset($_POST['content']))
       {
        $comment = new Comment();
        $_POST['user_id'] = $user->id;
        $_POST['article_id'] = $_REQUEST['article_id'];
        $comment->insertRecord($_POST);
        header("Location: /?c=article&a=show_article&article_id=".$_REQUEST['article_id']);
        exit;
       }
       else
       {
         header("Location: /?c=article&a=show_article&article_id=".$_REQUEST['article_id']);
         exit;
       }
     }
     else
     {
       header("Location: /?c=article&a=articles_list");
       exit;
    }
  }
}
