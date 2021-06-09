import programarCarrusel from "./carrusel.js"
import agregarActividades2 from "./actividades.js"
import crearHoras from "./horarios.js"
import JoinHelper from "./JoinHelper.js"
import manejadorPDF from "./pdfGenerator.js"


function ponerImagenOCarrusel(mediaQuery, $contenedorCarrusel) {
    const $carruselAnimal = document.getElementById("template-carrusel").content;
    if (mediaQuery.matches) {
        const $carruselAnimalClon = document.importNode($carruselAnimal, true);
        $contenedorCarrusel.appendChild($carruselAnimalClon)
        programarCarrusel("carrusel-animales")
    } else {
        const $imagen = document.createElement("img")
        $imagen.setAttribute("src", "img/leon.jpg")
        $imagen.style.width = "100%"
        $contenedorCarrusel.appendChild($imagen)
    }
}

function agregarContenedorCarrusel(contenedor) {
    const $contenedorCarrusel = document.querySelector(contenedor)
    const mediaQuery = matchMedia('(min-width: 400px)');
    ponerImagenOCarrusel(mediaQuery, $contenedorCarrusel)
    mediaQuery.addEventListener('change', event => {
        $contenedorCarrusel.removeChild($contenedorCarrusel.firstElementChild)
        ponerImagenOCarrusel(mediaQuery, $contenedorCarrusel)
    })
}

function manejarBotonMenu(e) {
    if (e.target.matches("#boton-menu")) {
        const $menu = document.getElementById("menu-principal")
        $menu.classList.toggle("dis-none")
        $menu.classList.toggle("dis-block")
        e.target.classList.toggle("fa-bars")
        e.target.classList.toggle("fa-times")
    }
}
document.addEventListener("DOMContentLoaded", e => {
    if (document.getElementById("horario")) {
        agregarHorariosActividades()
        manejadorPDF()
    }

    if (document.getElementById("index")) {
        agregarContenedorCarrusel("#contenedor-carrusel");
        agregarActividades2("#contenedor-actividades")
        document.addEventListener("click", e => {
            manejarBotonMenu(e)
        })
    }



})






























function agregarEventosDragAndDrop() {
    const $actividades = document.querySelectorAll("#cuerpo-tabla-actividades tr td"),
        $cuerpo = document.getElementById("cuerpo-tabla-horarios"),
        $contenedoresActividad = $cuerpo.querySelectorAll("tr td:nth-child(even)")
    let $acticidadSeleccionada;
    $actividades.forEach(actividad => {
        actividad.addEventListener("dragstart", e => {

            $acticidadSeleccionada = e.target
            e.target.classList.add("dragging")

        })
        actividad.addEventListener("drag", e => {


            e.target.classList.add("dragging")
        })
        actividad.addEventListener("dragend", e => {
            e.target.classList.remove("dragging")
            $acticidadSeleccionada = undefined
        })

    })
    $contenedoresActividad.forEach(contenedorActividad => {
        contenedorActividad.addEventListener("dragover", e => {
            e.preventDefault()
        })
        contenedorActividad.addEventListener("drop", async e => {
            contenedorActividad.innerHTML = ""
            const $acticidadSeleccionadaClon = document.importNode($acticidadSeleccionada, true)
            $acticidadSeleccionadaClon.className = ""
            const icono = document.createElement("i")
            icono.classList.add("far", "fa-window-close")
            icono.addEventListener("click", e => {
                contenedorActividad.removeChild($acticidadSeleccionadaClon)
            })
            $acticidadSeleccionadaClon.appendChild(icono)
            contenedorActividad.appendChild($acticidadSeleccionadaClon)
        })
    })
}

async function agregarHorariosActividades() {
    const helper = new JoinHelper(),
        actividadesConHorarios = await helper.innerJoin("actividades", "id_horarios", "horarios", "id")
    agregarActividades(actividadesConHorarios)
    agregarHorarios()
    agregarEventosDragAndDrop()

}

function agregarActividades(actividades) {
    const $templateActividad = document.getElementById("template-actividad").content,
        $fragmentoActividades = document.createDocumentFragment(),
        $cuerpoTablaActividades = document.getElementById("cuerpo-tabla-actividades")

    actividades.forEach(actividad => {
        const $templateActividadClon = document.importNode($templateActividad, true)
        $templateActividadClon.querySelector("td").innerHTML = actividad.nombre
        $fragmentoActividades.appendChild($templateActividadClon)
    })
    $cuerpoTablaActividades.appendChild($fragmentoActividades)
}

function agregarHorarios() {
    const hora_inicio = "14:00:00",
        hora_fin = "21:00:00",
        $templateHorarioDisponible = document.getElementById("template-horario-disponible").content,
        $fragmentoHorariosDisponibles = document.createDocumentFragment()

    let minutosInicio = parseInt(hora_inicio.substring(3, 5)),
        minutosFin = parseInt(hora_fin.substring(3, 5)),
        horaInicio = parseInt(hora_inicio.substring(0, 2)),
        horaFin = parseInt(hora_fin.substring(0, 2)),
        horas = crearHoras(horaInicio, minutosInicio, horaFin, minutosFin)

    horas.forEach(hora => {
        const $templateHorarioDisponibleClon = document.importNode($templateHorarioDisponible, true)
        $templateHorarioDisponibleClon.querySelector("td").innerHTML = hora
        $fragmentoHorariosDisponibles.appendChild($templateHorarioDisponibleClon)
    })

    document.getElementById("cuerpo-tabla-horarios").appendChild($fragmentoHorariosDisponibles)
}