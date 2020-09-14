<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

class TasksController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new TasksView();
        $this->model = new TasksModel();

    }

    function Home(){
        $tasks = $this->model->GetTasks();
        $this->view->ShowHome($tasks);
    }

    function InsertTask(){

        $completed = 0;
        if(isset($_POST['input_completed'])){
            $completed = 1;
        }

        $this->model->InsertTask($_POST['input_title'],$_POST['input_description'],$completed,$_POST['input_priority']);
        $this->view->ShowHomeLocation();
    }

    function DeleteTask($task_id){
        $this->model->DeleteTask($task_id);
        $this->view->ShowHomeLocation();
    }

    function MarkAsCompletedTask($task_id){
        $this->model->MarkAsCompletedTask($task_id);
        $this->view->ShowHomeLocation();
    }


}


?>