<?php

require_once "View/TasksView.php";
require_once "Model/TasksModel.php";
require_once "Model/dbConection.php";

class TasksController
{

    private $view;
    private $model;

    function __construct()
    {
        $this->view = new TasksView();
        $this->model = new TasksModel();
    }

    function Home()
    {
        $tasks = $this->model::get();
        $this->view->ShowHome($tasks);
    }

    function InsertTask()
    {
        if (!empty($_POST['input_title'])&& !empty($_POST['input_priority'])) {
            $completed = 0;
            if (isset($_POST['input_completed'])) {
                $completed = 1;
            }
            if ($this->CheckIfExists($_POST['input_title']) == false) {
                $this->model::create(['title'=>$_POST['input_title'],'description'=> $_POST['input_description'],'completed'=> $completed, 'priority'=>$_POST['input_priority']]);
                $this->view->ShowHomeLocation();
            } else {
                $this->view->RenderError('la tarea que intentas cargar ya existe por favor comprueba e intenta de nuevo');
            }
        }
      else {
          $this->view->RenderError('El titulo y la prioridad son obligatorios');
      }
    }

    function CheckIfExists($new_task_title)
    {
        $tasks = $this->model::get();
        foreach ($tasks as $task) {
            $title = $task->title;
            if (strpos($title, $new_task_title) !== false) {
                return true;
            } else {
                return false;
            }
        }
    }

    function BorrarLaTaskQueVienePorParametro($params = null)
    {
        $task_id = $params[':ID'];
        $this->model::destroy($task_id);
        $this->view->ShowHomeLocation();
    }

    function MarkAsCompletedTask($params = null)
    {
        $task_id = $params[':ID'];
        $this->model::find($task_id)->update(['completed'=> 1]);
        $this->view->ShowHomeLocation();
    }

    function EditModo($params = null)
    {
        $task_id = $params[':ID'];
        $task=$this->model::find($task_id);
        $this->view->ShowEditModo($task);
    }

    function EditTask($params = null)
    {
        $to_edit_id = $params[':ID'];

        $completed = null;
        if (isset($_POST['input_completed'])) {
            $completed = 0;
        }

        $this->model::find($to_edit_id)->update(['title'=>$_POST['input_title'],'description'=> $_POST['input_description'],'completed'=> $completed, 'priority'=>$_POST['input_priority']]);
        $this->view->ShowHomeLocation();
    }
    
    function ShowDetail($params = null)
    {
        $task_id = $params[':ID'];
        $task = $this->model::find($task_id);
        $this->view->RenderDetailed($task);
    }
}
