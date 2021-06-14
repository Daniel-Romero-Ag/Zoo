<?php
include("./Model.php");

class ORN extends Model{ 
    
    private $db_table;
    private $select;
    private $take;
    private $join;
    private $where;
    private $errors;
    
    public function __construct($db,$table)
    {
        $this->db_name=$db;
        $this->db_table=$table;
        $this->resetParams();
    }

    private function resetParams(){
        $this->select="*";
        $this->take="";
        $this->join="";
        $this->where="";
        $this->errors=[];
    }    
    public function columns(){
        $this->query="show columns from $this->db_table";
        $this->get_query();
        foreach ($this->rows as $key => $value) {
            $columns[]=$value["Field"];
        }
        $this->rows=$columns;
        return $this->rows;
    }
//El parámetro será la lista de campos en un array
//Ej. ["Campo1","Campo2","Campo3"]
//Acepta Alias, Ej. ["Campo1 as Campo1Nuevo"]
    public function select($fields){
        $this->select=implode(",",$fields);
    }

//El parámetro será el número de resultados que esperá recibir
    public function take($number){
        $this->take=" limit $number";
    }

//El parámetro será un array, 
//dentro de él habrá un array por cada join que deseemos hacer, Ej:
//[["CampoTablaOriginal","NombreTabla2","CampoTabla2"],
// ["CampoTablaOriginal","NombreTabla3","CampoTabla3"]]
    public function join($join){
        foreach ($join as $key => $value) {
            $joins[]="join ".$value[1]." on ". $this->db_table.".".$value[0]." = " . $value[1].".".$value[2];
        }
        $this->join =implode(" ",$joins);
        
    }

//El parámetro será un array, 
//dentro de él habrá un array por cada clausula que deseemos hacer, Ej:
//[["Campo","<","valor"],
// ["Campo","=","valor"]]
    public function where($clauses){
        if(gettype($clauses)=="array"){
            if(count($clauses)>1){
                $this->where=" WHERE " .$clauses[0][0]. $clauses[0][1] .$clauses[0][2];
                for ($i=1; $i < count($clauses); $i++) { 
                    if(count($clauses[$i])==3){
                        $this->where.= " AND ".$clauses[$i][0].$clauses[$i][1].$clauses[$i][2];
                    }else{
                        $this->errors[]="La clausula del where está mal estructurada";
                    }
                }
            }else if(count($clauses)==1){
                if(count($clauses[0])==3){
                    $this->where=" WHERE ".$clauses[0][0]. $clauses[0][1] .$clauses[0][2] ;
                }else{
                    $this->errors[]="La clausula del where está mal estructurada, deben ser 3 parámetros, Ej. (\"campo\",\"=\",\"valor\")"; 
                }
            
            }
        }else{
            $this->errors[]="El parámetro en where no es un array";
            
        }
     
    }
    public function getError(){
        return $this->error;
    }

    protected function create($datos){}
    
    public function read($id=""){
        if($id){
            if($this->where){
                $this->where= " and " . substr($this->where,6); 
                  
            }
            $this->query= "SELECT $this->select FROM $this->db_table $this->join WHERE $this->db_table.id = $id $this->where $this->take";
        }else{
            $this->query= "SELECT $this->select FROM $this->db_table $this->join $this->where $this->take";
        }
        $this->get_query();
        ($id && count($this->rows)==1)
        ? $this->rows= $this->rows[0]
        : $this->rows=$this->rows; 
        
        return $this->rows; 
    }
    protected function update($datos){}
    protected function delete($id){}
}

$actividades= new ORN("zoologico","actividades");
// var_dump($actividades->all());


$actividades->join([["id_horarios","horarios","id"],["id_categorias","categorias","id"]]);

$actividades->select(["horarios.id as idHorarios","actividades.nombre"]);

$actividades->where([["precio","=","1000"]]);
echo json_encode(["result"=>$actividades->read(2),"errors"=>$actividades->getError()]);
