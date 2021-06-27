<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
<?php 
    include("./PHP/components/header.php");
    ?>
    <?php 
        include("./PHP/Modelos/ORN.php");
        $actividades=new ORN("zoologico","actividades");
        $actividades->where([["precio","=","0"]]);
        $actividadesGratis= $actividades->read();
    ?>
 

    <main class="container">
    <h1 class="text-center">Comprar Boletos</h1>
    <div class="row  card" id="contenedor-boletos">
        <div class="col-12 card-body">
            <div class="row ">
                <div class="col-12 text-center h3">ZooTopia</div>
                <div class="col-12 text-center h4">Entrada General</div>
                <div class="col-4">
                    <p class="h5">Actividades Incluidas:</p>
                    <ul>
                        <?php foreach ($actividadesGratis as $key => $value) {  ?>
                            <li class="fw-bold" ><?php echo $value["nombre"] ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-4">
                    <form action="" class="row">
                        <label class="col-12 h5 text-center" for="" class="h5 text-center">Cantidad:</label>
                        <input class="col-6 text-center" name="cantidadBoletos" id="cantidadBoletos" value="1" min="0" type="number">
                        <input class="col-6 text-center" id="agregar" type="submit" value="Agregar">
                        <div class="col-12 text-center">Precio por boleto: <span id="precioBoleto">$150 mx</span></div>
                        <div class="col-12 text-center">Total: $<span class="total">150</span> mx</div>
                    </form>
                   
                </div>
                <div class="col-4 row">
                            <div class="col-12"><p><span class="fw-bold">Dirección:</span>  Miguel Hidalgo, Ciudad de México, CDMX</p></div>
                            <div class="col-12"><p><span class="fw-bold">Teléfono:</span> 999-9999-99</p></div>
                            <div class="col-12"><p><span class="fw-bold">Correo:</span>zootopia@zoologico.com.mx</p></div>
                </div>
            </div>     
        </div>
        <div class="card-footer m-0 p-0 col-12 row">
        <div class="accordion m-0 p-0 col-12" id="accordionExample">
        <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <div class="h4">Agregar Actividades</div>
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <ul class="list-group container-fluid g-0">
                </ul>
        </div>
        </div>
    </div>
        </div>
     
        
    </div>
     
     <div class="container mb-4">
        
            <h3 class="text-center">Lista</h3>
        
            <div class="row" id="contenedorBoletos">
                
            </div>
            <div class="row">
            <button id="comprarTodo" disabled class="col-4 mt-3 offset-4">Comprar</button>
            </div>
        
     </div>
    </main>


    <template id="boletoComprado">
        <div class="card col-6">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h3>Actividades</h3>
                    <ul class="listaActividades"  style="list-style:none; margin:0; padding:0">
                        
                    </ul>
                    <div class="row">
                        <div class="col-6 offset-6 border-top"></div>
                        <div class="col-6 ">P/u:</div>
                        <div class="col-6 total" >$12</div>
                    </div>
                </div>
                <div class="col-6 resumen">
                    <div class="row mt-4" style="vertical-align: center;">
                        
                        <div class="col-6 fw-bold">Boletos:</div>
                        <div class="col-6">1</div>
                        <div class="col-6 h5 fw-bold">Total:</div>
                        <div class="col-6 h5">$48</div>
                        <input class="col-11 offset-1" type="submit" value="Cancelar">
                    </div>
                </div>
            </div>
                            
            </div>
        </div>
    </template>

    <template id="actividadSeleccionada">
        <li>
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6"></div>
            </div>
        </li>
    </template>
    
    <template id="actividadDePaga">
        <li class="list-group-item col-12">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-3"></div>
                <div class="col-3 contenedor-cb"></div>
            </div>
        </li>
    </template>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="./js/comprar.js"></script>

</body>
</html>         