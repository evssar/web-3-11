<?php
  namespace controllers;
  use models\models\user;
  use utils\auth;

  class UserController extends Controller
  {
    public function sign_inAction()
    {
      if (auth::user() !== NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      if (isset($_POST['email']))
      {
        $user = new User();
        $user = $user->getUserByEmail($_POST['email']);
        if ($user !== NULL && $user->id !== NULL && $user->psswrd == $_POST['password'])
        {
          auth::login($user);
          header("Location: /?c=user&a=index");
          exit;
        }
        $this->view->message = "Email or password are not correct";
      }
      $this->view->render('user/sign_in', 'main_template');
    }

    public function sign_outAction()
    {
      auth::logout($user);
      header("Location: /");
      exit;
    }

    public function sign_upAction()
    {
      if (auth::user() !== NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      if(isset($_POST['email']) && isset($_POST['psswrd']))
      {
        $user = new User();
        if(!is_null($user->getRecordsByFieldValue('name',$_POST['name'])))
        {
          $this->view->message = "Пользователь с таким именем существует. Повторите регистрацию";
          $this->view->render('user/sign_up','main_template');
          exit;
        }
        if(!is_null($user->getRecordsByFieldValue('email',$_POST['email'])))
        {
          $this->view->message = "Пользователь с таким Email существует. Повторите регистрацию";
          $this->view->render('user/sign_up','main_template');
          exit;
        }
        $user->insertRecord($_POST);
        $this->view->title="Welcome Page";
        $this->view->message = "Регистрация прошла успешно";
        $this->view->render('page/index');
        exit;
      }
      $this->view->render('user/sign_up', 'main_template');
    }
    public function update_dataAction()
    {
      $user = auth::user();
      if ($user === NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      if(isset($_POST['email']) || isset($_POST['name']))
      {
        $user->updateRecordById($user->id,$_POST);
        auth::login($user);
        header("Location: /?c=user&a=index");
        exit;
      }
      $this->view->render('user/update_data', 'main_template', 'left_menu_template');
    }
      public function update_passwordAction()
      {
        $user = auth::user();
        if ($user === NULL)
        {
          header("Location: /?c=page&a=index");
          exit;
        }
        if(isset($_POST['psswrd']))
        {
          $user->updateRecordById($user->id,$_POST);
          auth::login($user);
          header("Location: /?c=user&a=index");
          exit;
        }
      $this->view->render('user/update_password', 'main_template', 'left_menu_template');
    }
    public function indexAction()
    {
      $user = auth::user();
      if ($user === NULL)
      {
        header("Location: /?c=page&a=index");
        exit;
      }
      $access = ['name','email'];
      $user_info = array();
      foreach ($access as $item)
      {
        $user_info[$item] = $user->$item;
      }

      $this->view->user_info=$user_info;

      $this->view->render('user/index', 'main_template', 'left_menu_template');
    }
  }
