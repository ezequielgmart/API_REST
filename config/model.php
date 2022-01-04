<?php
require ("db.php");

class Model {
    public $table ="";
    private $db;

    public function __construct($table) {
        $this->table = $table;
        $this->db = new Db();
    }

    public function get($fields){
        $query = $this->select($this->table,$fields);
        return $result = $this->db->getData($query);

    }
    public function getAll($user,$fields){
        $query = $this->selectByUser($user,$this->table,$fields);
        return $result = $this->db->getData($query);

    }
    
    public function getById($fields,$id,$criteria){
        $query = $this->selectById($this->table,$fields,$id,$criteria);
        return $result = $this->db->getData($query);

    }
    public function post($json){
        $query = $this->insertQuery($this->table,$json);
        return $result = $this->db->nonQuery($query);

    }

    
    public function delete($json){
       $query = $this->deleteQuery($this->table,$json);
        return $result = $this->db->nonQuery($query);

    }

    private function select($table,$fields){
        
        return $sql = "SELECT ". $fields ." FROM $table";

    }
    private function selectById($table,$fields,$id,$criteria){
        
        return $sql = "SELECT ". $fields ." FROM $table WHERE $criteria=$id";

    }
    private function selectByUser($user,$table,$fields){
        
        return $sql = "SELECT ". $fields ." FROM $table WHERE userId=$user";

    }

    private function insertQuery($table,$json){
        return $sql = "INSERT INTO $table $json";
    }

    private function deleteQuery($table,$json){
        return $sql = "DELETE FROM $table  WHERE " . $json[0] . "='".$json[1]."'";
    }

}



?>