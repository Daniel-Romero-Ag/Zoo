function darUnaVueltaALasImagenes($imagenes, tiempo) {

    $imagenes.forEach((imagen, index) => {
        setTimeout(() => {
            imagen.classList.add("show")
            imagen.classList.remove("hide")
            setTimeout(() => {
                imagen.classList.add("hide")
                imagen.classList.remove("show")
            }, tiempo);
        }, index * tiempo);
    });
}

export default function programarCarrusel(id_contenedor, tiempo) {
    const tiempoImagen = tiempo || 4000
    const $carrusel = document.getElementById(id_contenedor)
    const $imagenes = Array.from($carrusel.children)
    const cantidadImagenes = $imagenes.length
    darUnaVueltaALasImagenes($imagenes, tiempoImagen);
    setInterval(() => {
        darUnaVueltaALasImagenes($imagenes, tiempoImagen);
    }, cantidadImagenes * tiempoImagen);
}