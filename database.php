<?php

function GetTasks(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    $sentencia = $db->prepare("SELECT * FROM task");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function InsertTask(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    $sentencia = $db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
    
    $completed = 0;
    if(isset($_POST['input_completed'])){
        $completed = 1;
    }
    $sentencia->execute(array($_POST['input_title'],$_POST['input_description'],$completed,$_POST['input_priority']));
    header("Location: ".BASE_URL."home");
}


function DeleteTask($task_id){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    $sentencia = $db->prepare("DELETE FROM task WHERE id=?");
    $sentencia->execute(array($task_id));

    header("Location: ".BASE_URL."home");
}


function UpdateTask($task_id){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    $sentencia = $db->prepare("UPDATE task SET completed=1 WHERE id=?");
    $sentencia->execute(array($task_id));

    header("Location: ".BASE_URL."home");
}

?>