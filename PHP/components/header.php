
<?php 

    echo '
    <div class="contenedor-menu text-center container-fluid" style="overflow:hidden;">
    <div class="row ">
    <i class="fas fa-bars" style="background-color:#d8d964;" id="boton-menu"></i>
            <img src="img/logo.jpg" class="col-12 col-md-2" style="max-height:100%; padding-right:0;">
    <nav id="menu-principal" class="dis-none col-12 col-md-10 pt-3" style="font-size:20px;" >
                <ul>
                    <li>'. 
                        (($_SERVER["REQUEST_URI"]=="/zoo/index.php") 
                        ?'<a " href="index.php" class="activo">Inicio</a>'
                        :'<a " href="index.php">Inicio</a>')
                    .'</li>
                    <li>'.
                        (($_SERVER["REQUEST_URI"]=="/zoo/horario.php") 
                        ?'<a " href="horario.php" class="activo">Crea tu horario</a>'
                        :'<a " href="horario.php">Crea tu horario</a>')
                    .'</li>
                    <li>'.
                        (($_SERVER["REQUEST_URI"]=="/zoo/comprar.php") 
                        ?'<a " href="comprar.php" class="activo">Comprar</a>'
                        :'<a " href="comprar.php">Comprar</a>')    
                    .'</li>
                    <li>'.
                        (($_SERVER["REQUEST_URI"]=="/zoo/nosotros.php") 
                        ?'<a " href="nosotros.php" class="activo">Sobre nosotros</a>'
                        :'<a " href="nosotros.php">Sobre nosotros</a>') 
                    .'</li>
                </ul>
            </nav>
            </div>
    </div>
    '
?>

<script src="../../zoo/js/main.js" type="module"></script>