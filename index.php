<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://kit.fontawesome.com/f0f2121b70.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>

        <div id="contenedor-carrusel"></div>
        
            
<?php 
include_once("./PHP/components/header.php")
?>
        <div id="index"></div>
    </header>
    <main class="container">
        <h1 class="text-center">Ven y Conoce Zootopolis</h1>
        <div id="contenedor-actividades" class="row">

        </div>
    </main>


    <template id="template-carrusel">
        <div id="carrusel-animales" class="carrusel">
            <img src="img/leon.jpg" alt="" class="transcition-opacity hide">
            <img src="img/zebra.jpg" alt="" class="transcition-opacity hide">
            <img src="img/elefante.jpg" alt="" class="transcition-opacity hide">
        </div>
    </template>

    <template id="template-actividad">
        <div class="col-12 col-lg-6 mb-3" >
            <div class="card  col-12 h-100" >
                <div class="row g-0 h-100">
                    <div class="col-12 col-md-6 g-0">
                        <img style="height: 100%;" src="img/elefante.jpg" alt="...">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body">
                            <h3 class="card-title"></h3>
                            <p class="card-text h4"></p>
                            <a href="#" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </template>





    <template id="template-modal-acticidad">
        <div class="modal fade" id="modalActividad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p></p>
                    <p>Equipo: </p>
                    <div class="caracteristicas row">
                        <div class="col-8 offset-2 col-sm-4 offset-sm-0 g-1">
                            <div class="text-center edad_minima rounded-pill col-12  mt-2 py-1  bg-success">
                                <i class="fas fa-child"></i><i class="fas fa-plus"></i><strong>5y</strong>
                            </div>
                        </div>
                        <div class="col-8 offset-2 col-sm-4 offset-sm-0 g-1">
                            <div class=" text-center precio rounded-pill col-12   mt-2 py-1  bg-warning ">
                                <strong></strong>
                            </div>
                        </div>
                        <div class="col-8 offset-2 col-sm-4 offset-sm-0 g-1">
                            <div class="text-center col-12 horario rounded-pill mt-2 py-1  bg-success">
                                <i class="fas fa-clock"></i><strong></strong>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
    </template>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./js/main.js" type="module"></script>
    <script>
    </script>
</body>

</html>