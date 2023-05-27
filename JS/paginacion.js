/*Funciones para quitar y agregar los elementos al dar click en el boton siguiente*/

function mostrarNombre(){
    document.getElementById("parte1").classList.remove("right");
    document.getElementById("parte1").classList.add("desactivar");
    document.getElementById("parte2").classList.remove("desactivar");
    document.getElementById("parte2").classList.add("right");
}

function mostrarTelefono(){
    document.getElementById("parte2").classList.remove("right");
    document.getElementById("parte2").classList.add("desactivar");
    document.getElementById("parte3").classList.remove("desactivar");
    document.getElementById("parte3").classList.add("right");
}

function mostrarPassword(){
    document.getElementById("parte3").classList.remove("right");
    document.getElementById("parte3").classList.add("desactivar");
    document.getElementById("parte4").classList.remove("desactivar");
    document.getElementById("parte4").classList.add("right");
}
/*------------------------------------------------------------------------------*/

/* Botones para quitar y agregar los elementos al dar click en el boton anterior*/
function quitarPassword(){
    document.getElementById("parte4").classList.remove("right");
    document.getElementById("parte4").classList.add("desactivar");
    document.getElementById("parte3").classList.remove("desactivar");
    document.getElementById("parte3").classList.add("right");
}

function quitarTelefono(){
    document.getElementById("parte3").classList.remove("right");
    document.getElementById("parte3").classList.add("desactivar");
    document.getElementById("parte2").classList.remove("desactivar");
    document.getElementById("parte2").classList.add("right");
}

function quitarNombre(){
    document.getElementById("parte2").classList.remove("right");
    document.getElementById("parte2").classList.add("desactivar");
    document.getElementById("parte1").classList.remove("desactivar");
    document.getElementById("parte1").classList.add("right");
}
/*------------------------------------------------------------------------------*/

/*Funciones para detectar cuando se da click en los botones siguiente con el id correspondient*/

document.getElementById("btn-siguiente").onclick = function(){
    mostrarNombre();
}

document.getElementById("btn-siguiente1").onclick = function(){
    mostrarTelefono();
}

document.getElementById("btn-siguiente2").onclick = function(){
    mostrarPassword();
}

/*------------------------------------------------------------------------------*/

/*Funciones para detectar cuando se da click en los botones anterior con el id correspondient*/

document.getElementById("btn-anterior1").onclick = function(){
    quitarNombre();
}

document.getElementById("btn-anterior2").onclick = function(){
    quitarTelefono();
}

document.getElementById("btn-anterior3").onclick = function(){
    quitarPassword();
}

/*------------------------------------------------------------------------------*/