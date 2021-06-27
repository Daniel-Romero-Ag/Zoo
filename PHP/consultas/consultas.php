<?php
include("../Modelos/ORN.php");

if(json_decode(file_get_contents("php://input"),true)["consulta"]=="actividadesPaga"){
    $actividadesDePaga= new ORN("zoologico","actividades");
    $actividadesDePaga->where([["precio","!=","0"]]);
    $actividadesDePaga->join([["id_horarios","horarios","id"],["id_categorias","categorias","id"]]);
    $actividadesDePaga->select(["actividades.nombre","precio"]);

    echo json_encode($actividadesDePaga->read()) ;
}
?>