<?php

namespace views;

class View {
  protected $data =array();
  protected $path;

  public function __construct($path) {
    $this->path = $path;
  }

  public function __set($name, $val) {
    $this->data[$name] = $val;
  }

  public function render($content_template, $main_template = null, $left_menu_template = null)
  {
    extract($this->data);
    if(!is_null($main_template))
    {
      include($this->path.$main_template.'.php');
    }
    else
    {
      include($this->path.$content_template.'.php');
    }
  }
}
