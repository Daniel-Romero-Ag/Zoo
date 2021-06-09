<?php 

include "../Modelos/Pagination.php";

$actividades= new Pagination("zoologico","actividades","http://localhost/zoo/PHP/Paginations/actividades", $_GET["PaginationNumber"]);