export default function crearHoras(horaInicio, minutosInicio, horaFin, minutosFin) {
    if (horaInicio > horaFin || (minutosInicio != 30 && minutosInicio != 0)) {
        return "datos no validos"
    }
    let horas = []
    let horaActual = horaInicio
    let minutosActual = minutosInicio
    while (horaActual < horaFin || (horaActual == horaFin && minutosActual < minutosFin)) {
        if (horaActual < horaFin && minutosActual == 0) {
            horas = [...horas, `${horaActual}:${minutosActual}0-${horaActual}:${minutosActual+30}`]
            minutosActual += 30
        } else if (horaActual < horaFin && minutosActual == 30) {
            horas = [...horas, `${horaActual}:${minutosActual}-${horaActual+1}:${minutosActual-30}0`]
            horaActual++
            minutosActual -= 30
        } else if (horaActual == horaFin && minutosActual < minutosFin) {
            horas = [...horas, `${horaActual}:${minutosActual}0-${horaActual}:${minutosActual+30}`]
            minutosActual += 30
        } else if (horaActual == horaFin && minutosActual == minutosFin) {
            horaActual++
        }
    }
    return horas
}