<?php

class TasksModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tasks;charset=utf8', 'root', '');
    }
         
    function GetTasks($id = null){
        if (isset($id)) 
        {
            $sentencia = $this->db->prepare("SELECT * FROM task WHERE task.id=?");
            $sentencia->execute(array($id));
        }
        else
        {
            $sentencia = $this->db->prepare("SELECT * FROM task ORDER BY priority DESC");
            $sentencia->execute();
        }
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function InsertTask($title,$description,$completed,$priority){
        $sentencia = $this->db->prepare("INSERT INTO task(title, description, completed, priority) VALUES(?,?,?,?)");
        $sentencia->execute(array($title,$description,$completed,$priority));
    }
    
    function DeleteTaskDelModelo($task_id){
        $sentencia = $this->db->prepare("DELETE FROM task WHERE id=?");
        $sentencia->execute(array($task_id));
    }
    
    function MarkAsCompletedTask($task_id){
        $sentencia = $this->db->prepare("UPDATE task SET completed=1 WHERE id=?");
        $sentencia->execute(array($task_id));
    
    }
    
    function EditTask($edit_id,$new_title,$new_description,$new_completed,$new_priority){

        if (!empty($new_title)) {
            $sentencia= $this->db->prepare("UPDATE task SET title=? WHERE id=?");
            $sentencia->execute(array($new_title, $edit_id));
        }
        if (!empty($new_description)) {
            $sentencia= $this->db->prepare("UPDATE task SET description=? WHERE id=?");
            $sentencia->execute(array($new_description, $edit_id));
        }
        if (!empty($new_priority)) {
            $sentencia= $this->db->prepare("UPDATE task SET priority=? WHERE id=?");
            $sentencia->execute(array($new_priority, $edit_id));
        }
        if(isset($new_completed)){
            $sentencia= $this->db->prepare("UPDATE task SET completed=? WHERE id=?");
            $sentencia->execute(array(0, $edit_id));
        }

    }

}
