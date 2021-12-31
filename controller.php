<?php
require ("model.php");



class Controller {
    private $model;

    public function __construct($table){
        $this->model = new Model($table);


    }

    public function getAll($user,$fields){
       return $result = $this->model->getAll($user,$fields);
    }

    public function post($json){
       return $result = $this->model->post($json);

    }
}



?>