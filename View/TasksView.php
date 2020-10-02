<?php
include_once './libs/smarty/Smarty.class.php';
class TasksView
{
  private $smarty;


  function __construct()
  {
    $this->smarty = new smarty();
  }

  function ShowHome($tasks)
  {
    $this->smarty->assign('tasks', $tasks);

    $this->smarty->display('home.tpl');
  }
  function ShowEditModo($task)
  {

    $this->smarty->assign('task',$task);
    $this->smarty->assign('home_location',BASE_URL);

    $this->smarty->display('edit_modo.tpl');
  }

  function ShowHomeLocation()
  {
    header("Location: " . BASE_URL . "home");
  }

  function RenderDetailed($task)
  {
    $this->smarty->assign('task',$task);
    $this->smarty->assign('home_location',BASE_URL);

    $this->smarty->display('detailed.tpl');
  }
  
  function RenderError($error){
    $this->smarty->assign('error',$error);
    $this->smarty->assign('home_location',BASE_URL);

    $this->smarty->display('error.tpl');
  }
}
