export default function agregarActividades(contenedor) {
    fetch("http://localhost/zoo/PHP/Apis/actividades")
        .then(res => res.json())
        .then(res => {
            fetch("http://localhost/zoo/PHP/Apis/categorias")
                .then(resp => resp.json())
                .then(resp => {
                    fetch("http://localhost/zoo/PHP/Apis/horarios").then(hor => hor.json()).then(hor => {

                        let actividades = []
                        res.forEach(actividad => {
                            resp.forEach(categoria => {
                                hor.forEach(hora => {

                                    if (actividad.id_categorias == categoria.id && actividad.id_horarios == hora.id) {
                                        actividades = [...actividades, {...actividad, "categoria": categoria.nombre, "hora_inicio": hora.hora_inicio, "hora_fin": hora.hora_fin }]
                                    }
                                })
                            })
                        });

                        const $contenedorActividades = document.querySelector(contenedor)
                        const $templateActividad = document.getElementById("template-actividad").content
                        const $activitiesFragment = document.createDocumentFragment()
                        actividades.forEach(actividad => {
                            const $templateActividadClon = document.importNode($templateActividad, 1)
                            $templateActividadClon.querySelector(".card-title").innerText = actividad.nombre
                            $templateActividadClon.querySelector(".card-text").innerText = actividad.descripcion
                            let fondo
                            if (actividad.categoria == "Acuatica") {
                                fondo = "bg-agua"
                            } else if (actividad.categoria == "Terrestre") {
                                fondo = "bg-tierra"
                            }
                            $templateActividadClon.querySelector("a").addEventListener("click", e => {
                                e.preventDefault()
                                mostrarModal(actividad)
                            })
                            $templateActividadClon.querySelector(".card").classList.add(fondo)
                            $activitiesFragment.appendChild($templateActividadClon)
                        });
                        $contenedorActividades.appendChild($activitiesFragment)

                    })
                })

        })



}

function mostrarModal({ nombre, edad_minima, precio, descripcion_larga, equipo, hora_inicio, hora_fin }) {
    const $modalAnterior = document.getElementById("modalActividad")
    if ($modalAnterior) {
        const $body = document.getElementsByTagName("body")[0]
        $body.removeChild($modalAnterior)
    }
    const $modalActividad = document.getElementById("template-modal-acticidad").content;
    const $modalActividadClon = document.importNode($modalActividad, true)
    $modalActividadClon.querySelector(".modal-title").innerText = nombre

    $modalActividadClon.querySelectorAll(".modal-body p")[1].innerText += equipo
    $modalActividadClon.querySelector(".modal-body p").innerText = descripcion_larga
    $modalActividadClon.querySelector(".edad_minima strong").innerText = `${edad_minima}y`
    console.log(precio)
    let precioAux
    if (precio == 0) {
        precioAux = "Gratis"
    } else {
        precioAux = `<i class="fas fa-dollar-sign"></i>${precio}.00 mx`
    }
    $modalActividadClon.querySelector(".precio strong").innerHTML = precioAux
    $modalActividadClon.querySelector(".horario strong").innerHTML = `${hora_inicio.substring(0,5)} - ${hora_fin.substring(0,5)}`
    document.querySelector("body").appendChild($modalActividadClon)
    console.log(document.getElementById("modalActividad").setAttribute("id", "modalActividad"))
    console.log(document.querySelector("body"))
    var myModal = new bootstrap.Modal(document.getElementById("modalActividad"))
    myModal.show();
}