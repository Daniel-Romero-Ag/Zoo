document.addEventListener("DOMContentLoaded", e => {
    let actividadesSeleccionadas = {
        "Entrada General": 150
    }

    let precioBoleto = 150
    const $total = document.querySelector(".total")
    const $cantidadBoletos = document.getElementById("cantidadBoletos")
    const $precioBoleto = document.getElementById("precioBoleto")
    $cantidadBoletos.addEventListener("change", e => {
        $total.innerHTML = precioBoleto * Number.parseInt($cantidadBoletos.value)
    })

    $cantidadBoletos.addEventListener("input", e => {
        $total.innerHTML = precioBoleto * Number.parseInt($cantidadBoletos.value)
    })

    let actividades;
    document.addEventListener("click", e => {
        if (e.target.matches(".accordion-button")) {
            if (!actividades) {
                actividades = true
                fetch("http://localhost/zoo/PHP/consultas/consultas.php", {
                        method: "POST",
                        body: JSON.stringify({ consulta: "actividadesPaga" })
                    })
                    .then(res => res.json())
                    .then(res => {
                        const $templateActividadPaga = document.getElementById("actividadDePaga").content,
                            $fragmentoActividadesPaga = document.createDocumentFragment()
                        res.forEach(actividadPaga => {
                            const $clonActividadPaga = document.importNode($templateActividadPaga, true),
                                $CheckBox = document.createElement("input")
                            $CheckBox.setAttribute("type", "checkbox")
                            $CheckBox.addEventListener("change", e => precioBoleto = manejadorCheckBox(e, precioBoleto, $precioBoleto, actividadPaga, actividadesSeleccionadas))
                            $clonActividadPaga.querySelector(".col-6").innerText = actividadPaga.nombre
                            $clonActividadPaga.querySelectorAll(".col-3")[0].innerText = actividadPaga.precio
                            $clonActividadPaga.querySelectorAll(".col-3")[1].appendChild($CheckBox)
                            $fragmentoActividadesPaga.appendChild($clonActividadPaga)
                        });
                        e.target.parentNode.nextElementSibling.firstElementChild.appendChild($fragmentoActividadesPaga)
                    })
            }
        }
        if (e.target.matches(".resumen input")) {
            const comprarTodo = document.getElementById("comprarTodo")
            const $contenedorBoletos = document.getElementById("contenedorBoletos")

            const $cardBotonCancelar = e.target.parentNode.parentNode.parentNode.parentNode.parentNode
            const $listaCardCancelada = $cardBotonCancelar.parentNode
            $listaCardCancelada.removeChild($cardBotonCancelar)
            if ($contenedorBoletos.firstElementChild == null) {
                comprarTodo.disabled = true

            } else {

            }
        }
        if (e.target.matches("#comprarTodo")) {
            const $contenedorBoletos = document.getElementById("contenedorBoletos")
            if ($contenedorBoletos.firstElementChild == null) {
                console.log("no comprar")
            } else {
                $contenedorBoletos.innerHTML = ""
                e.target.disabled = true
            }
        }
        if (e.target.matches("#agregar")) {
            e.preventDefault()
            document.getElementById("comprarTodo").disabled = false
            const boletos = e.target.previousElementSibling.value
            e.target.previousElementSibling.value = 1
            document.querySelectorAll(".contenedor-cb").forEach(el => {
                el.firstElementChild.checked = false
            })
            const $boletoComprado = document.getElementById("boletoComprado").content
            const $boletoCompradoClon = document.importNode($boletoComprado, true)

            const $listaBoleto = $boletoCompradoClon.querySelector(".listaActividades")
            const $contenedorBoletos = document.getElementById("contenedorBoletos")

            const $actividadSeleccionada = document.getElementById("actividadSeleccionada").content
            const $fragmentoActividades = document.createDocumentFragment()
            let total = 0;
            for (const iterator in actividadesSeleccionadas) {
                const $actividadSeleccionadaClon = document.importNode($actividadSeleccionada, true)
                $actividadSeleccionadaClon.querySelectorAll(".col-6")[0].innerHTML = iterator
                $actividadSeleccionadaClon.querySelectorAll(".col-6")[1].innerHTML = actividadesSeleccionadas[iterator]
                $fragmentoActividades.appendChild($actividadSeleccionadaClon)
                total += actividadesSeleccionadas[iterator]

            }
            $boletoCompradoClon.querySelector(".total").innerHTML = total
            $boletoCompradoClon.querySelector(".resumen").firstElementChild.children[1].innerHTML = boletos
            $boletoCompradoClon.querySelector(".resumen").firstElementChild.children[3].innerHTML = boletos * total
            $listaBoleto.appendChild($fragmentoActividades)

            $contenedorBoletos.appendChild($boletoCompradoClon)
        }
    })
})



function manejadorCheckBox(e, precioBoleto, $precioBoleto, actividadPaga, actividadesSeleccionadas) {
    e.target.checked ?
        precioBoleto += Number.parseInt(actividadPaga.precio) :
        precioBoleto -= Number.parseInt(actividadPaga.precio)
    e.target.checked ?
        actividadesSeleccionadas[actividadPaga.nombre] = Number.parseInt(actividadPaga.precio) :
        delete actividadesSeleccionadas[actividadPaga.nombre]

    $precioBoleto.innerText = `$${precioBoleto} mx`
    let $total = document.querySelector(".total")
    let $cantidadBoletos = document.getElementById("cantidadBoletos")
    $total.innerHTML = precioBoleto * Number.parseInt($cantidadBoletos.value)
    return precioBoleto
}