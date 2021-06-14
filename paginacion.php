<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Prueba</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
            </tr>
        </thead>
        <tbody id="cuerpo-actividades">    
        </tbody>
    </table>
    <template id="fila">
            <tr>
                <td>1</td>
                <td>juan</td>
            </tr>
    </template>
    <button id="siguiente">Siguiente</button>
    <script>
        let nextURL="http://localhost/zoo/PHP/Paginations/actividades";
      
        fetchPagination(nextURL)
    boton()
        function fetchPagination(URL){
            fetch(URL).then(res=>res.json()).then(res=>{
                agregarActividades(res.results)
                nextURL= res.nextURL
                
            })
        }
        function boton(){
            const $boton= document.getElementById("siguiente")
                $boton.addEventListener("click",e=>{
                    
                    fetchPagination(nextURL)
                })
        }

        function agregarActividades(actividades){
            const $fila= document.getElementById("fila").content
                const $cuerpoActividades= document.getElementById("cuerpo-actividades")
                $cuerpoActividades.innerHTML=""
                const $fragmento= document.createDocumentFragment()
                
                actividades.forEach(element => {
                    const $filaClon=document.importNode($fila,true)
                    $filaClon.querySelectorAll("td")[0].innerText=element.id
                    $filaClon.querySelectorAll("td")[1].innerText=element.nombre
                    $fragmento.appendChild($filaClon);
                });
                $cuerpoActividades.appendChild($fragmento)
        }
    </script>
</body>
</html>