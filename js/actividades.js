export default function agregarActividades(contenedor) {
    fetch("http://localhost/zoo/PHP/Apis/actividades")
        .then(res => res.json())
        .then(res => {
            fetch("http://localhost/zoo/PHP/Apis/categorias")
                .then(resp => resp.json())
                .then(resp => {
                    let actividades = []
                    res.forEach(actividad => {
                        resp.forEach(categoria => {
                            if (actividad.id_categorias == categoria.id) {
                                actividades = [...actividades, {...actividad, "categoria": categoria.nombre }]
                            }
                        })
                    });
                    const $contenedorActividades = document.querySelector(contenedor)
                    const $templateActividad = document.getElementById("template-actividad").content
                    const $activitiesFragment = document.createDocumentFragment()
                    actividades.forEach(actividad => {
                        console.log("--------------")
                        console.log(actividad)
                        const $templateActividadClon = document.importNode($templateActividad, 1)
                        $templateActividadClon.querySelector(".card-title").innerText = actividad.nombre
                        $templateActividadClon.querySelector(".card-text").innerText = actividad.descripcion
                        let fondo
                        if (actividad.categoria == "Acuatica") {
                            fondo = "bg-agua"
                        } else if (actividad.categoria == "Terrestre") {
                            fondo = "bg-tierra"
                        }
                        $templateActividadClon.querySelector(".card").classList.add(fondo)
                        $activitiesFragment.appendChild($templateActividadClon)
                    });
                    $contenedorActividades.appendChild($activitiesFragment)
                })

        })



}