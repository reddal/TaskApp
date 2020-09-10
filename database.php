<?php

function GetTasks(){
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    $sentencia = $db->prepare("SELECT * FROM task");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}
?>