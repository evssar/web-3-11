<?php

session_start();

function ClassAutoLoader($className)
{
  $c = str_replace('\\', DIRECTORY_SEPARATOR, $className);
  include_once('application' . DIRECTORY_SEPARATOR .$c.'.php');
}

spl_autoload_register('ClassAutoLoader');

function GetController($name)
{
  $cName = 'controllers\\'.ucfirst($name).'Controller';
  try
  {
      $c = new $cName();
      $c->init($name);
  }
  catch (Exception $e)
  {
      $c = new controllers\PageController();
      $c.init();
  }
  return $c;
}

$c = getController(isset($_GET['c']) ? $_GET['c'] : 'page');
$c->run();
