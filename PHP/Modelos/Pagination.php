<?php 
require('Model.php');

class Pagination extends Model{
    private $url;
    private $nextUrl;
    private $paginationPage;
    private $resultsPerPagination;
    private $table;


    public function __construct($db,$table,$url,$paginationPage)
    {

        $this->resultsPerPagination=3;
        $this->paginationPage=$paginationPage;
        $this->db_name=$db;
        $this->table=$table;
        $this->url=$url;
        $this->paginate();
    }
    protected function paginate(){
        $lowerLimit=($this->paginationPage-1)*3;
        $maxiumResultsNumber=$this->resultsPerPagination+1;
        $this->query=   "SELECT * FROM $this->table LIMIT $lowerLimit, $maxiumResultsNumber";
        $this->get_query();
        if($this->affected_rows<4){
            $this->nextUrl=false;
        }
        else{
            $this->nextUrl=$this->url."/".($this->paginationPage+1);
            array_pop($this->rows);
        }
        $response["results"]=$this->rows;
        $response["nextURL"]=$this->nextUrl;
        echo json_encode($response) ;
        
    }

    protected function read($id){}
     protected function create($datos){}
     protected function update($datos){}
     protected function delete($id){}


}