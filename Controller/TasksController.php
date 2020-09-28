<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

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
        $tasks = $this->model->GetTasks();
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
                $this->model->InsertTask($_POST['input_title'], $_POST['input_description'], $completed, $_POST['input_priority']);
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
        $tasks = $this->model->GetTasks();
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
        $this->model->DeleteTaskDelModelo($task_id);
        $this->view->ShowHomeLocation();
    }

    function MarkAsCompletedTask($params = null)
    {
        $task_id = $params[':ID'];
        $this->model->MarkAsCompletedTask($task_id);
        $this->view->ShowHomeLocation();
    }

    function EditModo($params = null)
    {
        $task_id = $params[':ID'];
        $task=$this->model->GetTasks($task_id);
        $this->view->ShowEditModo($task);
    }

    function EditTask($params = null)
    {
        $to_edit_id = $params[':ID'];

        $completed = 0;
        if (isset($_POST['input_completed'])) {
            $completed = 1;
        }

        $this->model->EditTask($to_edit_id, $_POST['input_title'], $_POST['input_description'], $completed, $_POST['input_priority']);
        $this->view->ShowHomeLocation();
    }
    
    function ShowDetail($params = null)
    {
        $task_id = $params[':ID'];
        $task = $this->model->GetTasks($task_id);
        $this->view->RenderDetailed($task);
    }
}
