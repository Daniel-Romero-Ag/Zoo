<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f0f2121b70.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">
    <script src="js/html2pdf.bundle.js"></script>
</head>

<body>
<div id="horario"></div>
    <?php 
    include("./PHP/components/header.php")
    ?>
    <div class="contenedor-horario container mt-3">

        <h1 class="text-center">Vive la experiencia a tu manera!!</h1>
        <div class="row">
            <table style="background-color: white;" class="col-5 border border-3">
                <thead>
                    <tr>
                        <th>Actividades</th>
                    </tr>
                </thead>
                <tbody id="cuerpo-tabla-actividades"></tbody>
            </table>

            <table id="tabla-horarios" style="background-color: white;" class="col-5 offset-2  border border-3">
                <thead class="text-center">
                    <tr>
                        <th class="col-4 border-3 border-end border-0"><i class="fas fa-clock"></i></th>
                        <th class="col-8">Actividad</th>
                    </tr>
                </thead>
                <tbody id="cuerpo-tabla-horarios">
                </tbody>
            </table>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-4 offset-4">
                <button id="boton-pdf" type="button" class="btn btn-secondary" style="width: 100%;">Descargar Horario</button>
            </div>
        </div>
    </div>


    <template id="template-pdf">
        <div a id="pagina-pdf" class=" text-center" style=" background-image: url(./img/tierra.jpg); min-height: 1580px;">
            <h1 class="pt-3">Disfruta tu Visita!!</h1>
            <div class="row">
                <div class="offset-2 col-8" id="contenedor-horario-listo" ></div>
                <div class="mt-5 offset-2 col-8" id="imagen-croquis">
                    <img src="./img/croquis.jpg" alt="">
                </div>
            </div>
        </div>
    </template>

    <template id="template-horario-disponible">
            <tr >
                    <td class="border-0 border-end border-3 border-top"></td>
                    <td class="border-0 border-end border-3 border-top"></td>
            </tr>      
    </template>
    <template id="template-actividad">
            <tr>
                    <td draggable="true" class="border-0 border-end border-3 border-top"></td>
            </tr>      
    </template>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </script>
    <script>
    </script>
    <script src="js/main.js" type="module"></script>
    <script>
    </script>
</body>

</html>