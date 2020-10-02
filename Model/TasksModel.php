<?php
require_once 'vendor/autoload.php'; 
use Illuminate\Database\Eloquent\Model;
class TasksModel extends Model{
    //<----con esto ya es consultable -->
    protected $table = 'task';
   //<---------------------------------->
   //<----configuro campos cargables/editables (todos menos ID y timestamps) -->
   protected $fillable =[
       'title',
       'description',
       'completed',
       'priority',
   ];

}
