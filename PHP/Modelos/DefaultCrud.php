<?php 
require('Model.php');

class DefaultCrud extends Model{
    public $status_id;
    public $status;
    private $table;

    public function __construct($db,$table)
    {
        $this->db_name=$db;
        $this->table=$table;
    }

    public function create($datos){
        foreach ($datos as $key => $value) {
            gettype($value)=="string" ? $valores[]="\"".$value."\"" : $valores[]=$value;
            $campos[]=$key;
        }
        $campos=implode(",",$campos);
        $valores=implode(",",$valores);
        $this->query="INSERT INTO $this->table($campos) VALUES($valores)";
        $this->set_query();
     }

     public function read($id=""){
      $this->query=  $id 
                ? "SELECT * FROM $this->table WHERE id = $id"
                : "SELECT * FROM $this->table";
        $this->get_query();
        ($id && count($this->rows)==1)
        ? $this->rows= $this->rows[0]
        : $this->rows=$this->rows; 
       
        return $this->rows; 
     }
     public function update($datos){
     
        foreach ($datos as $key => $value) {
            gettype($value)=="string" 
                ? $string[] = "$key = \"$value\""
                : $string[] = "$key = $value" ;
        }

        $sets= implode(",",$string);
        $this->query= "UPDATE $this->table SET $sets WHERE id = ". $datos["id"];
        $this->set_query();      
     }

     public function delete($id){
        $this->query="DELETE FROM $this->table WHERE id = $id;";
        $this->set_query();
     }

}