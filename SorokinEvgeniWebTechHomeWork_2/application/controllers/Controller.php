<?php

namespace controllers;

use views\View;

class Controller {
  protected $controller;
  protected $action = 'index';
  protected $view;

  public function init($name) {
    $this->controller = $name;
    if (isset($_GET['a']))
    {
      $this->action = $_GET['a'];
    }
    $this->view = new View($_SERVER['DOCUMENT_ROOT'].'/application/views/templates/');
  }

  public function run() {
    $a = $this->action.'Action';
    $this->$a();
  }

  public function __call($name, $arg) {
    echo 'Page not found!!!';
  }
}
