<?php
require ("db.php");




class Model {
    public $table ="";
    private $db;

    public function __construct($table) {
        $this->table = $table;

        $this->db = new Db();
    }

    public function getAll($user,$fields){
        $query = $this->selectByUser($user,$this->table,$fields);
        return $result = $this->db->getData($query);

    }

    public function post($json){
        $query = $this->insert($this->table,$json);
        return $result = $this->db->nonQuery($query);

    }

    private function selectByUser($user,$table,$fields){
        
        return $sql = "SELECT ". $fields ." FROM $table WHERE userId=$user";

    }

    private function insert($table,$json){
        return $sql = "INSERT INTO $table $json";
    }

}



?>