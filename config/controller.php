<?php
require ("model.php");

class Controller {
    private $model;

   public function __construct($table){
      $this->model = new Model($table);
   }

   public function get($fields){
      return $result = $this->model->get($fields);
   }
   public function getAll($user,$fields){
      return $result = $this->model->getAll($user,$fields);
   }

   public function getById($fields,$id,$criteria){
      
      return $result = $this->model->getById($fields,$id,$criteria);
    }
   public function post($json){
      return $result = $this->model->post($json);

   }
    
   public function delete($json){
      return $result = $this->model->delete($json);

   }
}



?>