<?php

abstract class Model{
    private static $db_host ="localhost";
    private static $db_user ="root";
    private static $db_pass ="";
    protected $db_name;
    private static $db_charset='utf8';
    private $conn;
    protected $affected_rows;
    protected $query;
    protected $rows=array();

    abstract protected function create($datos);
    abstract protected function read($id);
    abstract protected function update($datos);
    abstract protected function delete($id);

    private function db_open(){
        $this->conn= new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            $this->db_name
        );

        $this->conn->set_charset(self::$db_charset); 
    }
    private function db_close(){
        $this->conn->close();
    }

    protected function set_query(){
        $this->db_open();
        $this->conn->query($this->query);
        $this->affected_rows=$this->conn->affected_rows;
        $this->db_close();
    }
    
    protected function get_query(){
        $this->db_open();
        $result=$this->conn->query($this->query);
        $this->affected_rows=$this->conn->affected_rows;
        if($this->affected_rows===-1){
            $this->rows=[];
        }else{
            while($this->rows[]=$result->fetch_assoc());
            array_pop($this->rows);
            $result->close();
        }
        $this->db_close();
       
        return $this->rows;
    }

}