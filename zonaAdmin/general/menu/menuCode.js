'use strict';
document.querySelector('.cerrarMenuImagen').onclick = this.cerrarMenu;
document.querySelector('.imagenMenu').onclick = this.abrirMenu;
function abrirMenu(){
    var menu = document.querySelector('.contenedorMenu');
    menu.style.transform = 'translateX('+ 0 +'px)';
    var nDiv = document.createElement('div');
    nDiv.setAttribute('class', 'fondoTransparente');
    nDiv.setAttribute('onclick', 'cerrarMenu()');
    document.querySelector('main').appendChild(nDiv);
    menu.style.transition = 'all 200ms ease-out';
}
function cerrarMenu(){
    var menu = document.querySelector('.contenedorMenu');
    menu.style.transform = 'translateX('+ -95 +'%)';
    document.querySelector('.fondoTransparente').remove();
    menu.style.transition = 'all 200ms ease-out';
}
function mandarFormulario() {
    var boton = document.getElementById("botonCerrarSesion");
    boton.click();
}