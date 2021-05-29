import programarCarrusel from "./carrusel.js"
import agregarActividades from "./actividades.js"

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

    agregarContenedorCarrusel("#contenedor-carrusel");
    agregarActividades("#contenedor-actividades")
    document.addEventListener("click", e => {
        manejarBotonMenu(e)
    })


})