<?php 
require('DefaultCrud.php');
// header('Content-Type: application/json'); En teoria hay que ponerlo
class DefaultApi extends DefaultCrud{

    public function __construct($db,$table)
    {
        parent::__construct($db,$table);
        $this->defaultApi();   
    }
    function defaultApi(){
        if($_SERVER["REQUEST_METHOD"]==="GET"){ 
            if(isset($_GET["id"])){
                $result=parent::read($_GET["id"]);
            }else{
                $result=parent::read();
            }
           
           echo ($this->affected_rows===-1) 
            ?  json_encode(["res"=>"false"])
            : json_encode($result,JSON_UNESCAPED_UNICODE);
            
        }else if($_SERVER["REQUEST_METHOD"]==="POST"){
            $data = json_decode(file_get_contents("php://input"));
            parent::create($data);
            echo ($this->affected_rows===-1||$this->affected_rows===0) 
            ?  json_encode(["res"=>"false"])
            : json_encode(["res"=>"true"]);       
        }else if($_SERVER["REQUEST_METHOD"]==="PUT"){
            
                $data = json_decode(file_get_contents("php://input"),true);
                $data["id"]=$_GET["id"];
                parent::update($data);
                echo ($this->affected_rows===-1||$this->affected_rows===0) 
                    ?  json_encode(["res"=>"false"])
                    : json_encode(["res"=>"true"]);  
                
        }else if($_SERVER["REQUEST_METHOD"]==="DELETE"){
            parent::delete($_GET["id"]);
            echo ($this->affected_rows===-1||$this->affected_rows===0) 
                    ?  json_encode(["res"=>"false"])
                    : json_encode(["res"=>"true"]);  
        }
    }    
}


