
function buscarPostres() {

    let buscador = document.getElementById("buscador");
    let filtro = buscador.value.toLowerCase();

    let tarjetas = document.querySelectorAll(".tarjeta-producto");

    tarjetas.forEach(function(tarjeta) {

        let nombre = tarjeta.textContent.toLowerCase();

        if (nombre.includes(filtro)) {
            tarjeta.style.display = "";
        } else {
            tarjeta.style.display = "none";
        }

    });

}