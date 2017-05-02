<?php

namespace controllers;
use utils\Auth;
use utils\Mail;

class PageController extends Controller {

  public function indexAction()
  {
    $this->view->user = Auth::user();
    $this->view->message = is_null(auth::user()) ? 'Авторизуйтесь для перехода на главную страницу' : 'Вы авторизованны как '. auth::user()->email.'.';

    $this->view->title="Welcom Page";
    $this->view->render('page/index');
  }

  public function contactsAction()
  {
    $left_menu = 'left_menu_template';
    if (is_null(Auth::user())) $left_menu = NULL;
    $this->view->render('page/contacts', 'main_template', $left_menu);
  }

  public function mailAction()
  {
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['content']))
    {
      $mail = new Mail();

      if($mail->assignData($_POST))
      {
        if($mail->send())
        {
          $message = 'Письмо успешно отправленно';
        }
        else
        {
          $message = 'Произошла ошибка. Письмо не отправленно';
        }
        $this->view->message = $message;
      }
    }
    $left_menu = 'left_menu_template';
    if (is_null(Auth::user())) $left_menu = NULL;
    $this->view->render('page/mail', 'main_template', $left_menu);
  }
}
