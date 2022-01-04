<?php
require ("controller.php");

class View {

    public $table;
    public $controller;
    public $dateTime;


    public function __construct($table){
        $this->table = $table;
        $this->controller = new Controller($table);
    }

    public function get($fields){
      return $result = $this->controller->get($fields);
    }

    public function getAll($user,$fields){
        echo json_encode($result = $this->controller->getAll($user,$fields));
    }

    public function getById($fields,$id,$criteria){
      
      return $result = $this->controller->getById($fields,$id,$criteria);
    }
    public function today(){
        return $this->dateTime = date("y-m-d h:i:s");
    }

    public function inputData(){
        return $data = json_decode(file_get_contents("php://input"),false);
    }

    public function post($json){
      return $result = $this->controller->post($json);
      if($result > 0) {
          http_response_code(201);
      } else {
        http_response_code(500);
      }
      
    }

    public function delete($json){
      return $result = $this->controller->delete($json);
      
      
    }
}



?>