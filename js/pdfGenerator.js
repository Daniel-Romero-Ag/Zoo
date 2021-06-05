export default function manejadorPDF() {
    const $botonPdf = document.querySelector("#boton-pdf")
    document.addEventListener("click", e => {
        if (e.target === $botonPdf) {
            const $templatePDF = document.getElementById("template-pdf").content,
                $templatePDFClon = document.importNode($templatePDF, true),
                $tablaPDF = document.getElementById("tabla-horarios"),
                $tablaPDFClon = document.importNode($tablaPDF, true),
                $contenedor = $templatePDFClon.getElementById("contenedor-horario-listo"),
                $paginaPDF = $templatePDFClon.getElementById("pagina-pdf"),
                $imgCroquis = $templatePDFClon.getElementById("imagen-croquis")
            $tablaPDFClon.classList.replace("col-5", "col-12")
            $tablaPDFClon.classList.remove("offset-2")
            if ($tablaPDF.offsetHeight > 600) {
                $contenedor.classList.add("alto")
                $imgCroquis.classList.add("alto")

            }
            $contenedor.appendChild($tablaPDFClon)
            console.log($paginaPDF)
            html2pdf()
                .set({
                    margin: 0,
                    filename: 'documento.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3,
                        letterRendering: true,
                    },
                    jsPDF: {
                        unit: "in",
                        format: "a3",
                        orientation: 'portrait'
                    }
                }).from($paginaPDF)
                .save()
        }
    })
}