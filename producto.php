<?php 
require("./PHP/Modelos/DefaultCrud.php");
$productos= new DefaultCrud("zoologico","actividades");
$actividad= $productos->read($_GET["id"]);
var_dump($actividad);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>HOLA</h1>   
</body>
</html>