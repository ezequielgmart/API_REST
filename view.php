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

    public function getAll($user,$fields){
        echo json_encode($result = $this->controller->getAll($user,$fields));
    }

    public function today(){
        return $this->dateTime = date("y-m-d h:i:s");
    }

    public function inputdata(){
        return $data = json_decode(file_get_contents("php://input"),false);
    }
    public function post($json){
      $result = $this->controller->post($json);
      if($result > 0) {
          http_response_code(201);
      } else {
        http_response_code(500);
      }
      
    }

}



?>