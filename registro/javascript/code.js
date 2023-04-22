'use strict';
window.onload = function(){
    document.getElementById('parte1').style.display = 'block';
    document.getElementById('parte2').style.display = 'none';
    document.getElementById('parte3').style.display = 'none';
    document.getElementById('tBotonSiguiente1').onclick = this.mostrarParte2;
    document.getElementById('tBotonAnterior1').onclick = this.mostrarParte1;
    document.getElementById('tBotonSiguiente2').onclick = this.mostrarParte3;
    document.getElementById('tBotonAnterior2').onclick = this.mostrarParte2;
}
function mostrarParte1(){
    const nParte1 = document.getElementById('parte1');
    const nParte2 = document.getElementById('parte2');
    const nParte3 = document.getElementById('parte3');
    document.getElementById('puntero2').classList.remove('puntero');
    if ((nParte2.style.display = 'block') || (nParte3.style.display = 'block')){
        nParte1.style.display = 'block';
        nParte2.style.display = 'none';
        nParte3.style.display = 'none';
    }
}
function mostrarParte2(){
    const nParte1 = document.getElementById('parte1');
    const nParte2 = document.getElementById('parte2');
    const nParte3 = document.getElementById('parte3');
    document.getElementById('puntero2').className = 'puntero';
    document.getElementById('puntero3').classList.remove('puntero');
    if ((nParte1.style.display = 'block') || (nParte3.style.display = 'block')){
        nParte1.style.display = 'none';
        nParte2.style.display = 'block';
        nParte3.style.display = 'none';
    }
}
function mostrarParte3(){
    const nParte1 = document.getElementById('parte1');
    const nParte2 = document.getElementById('parte2');
    const nParte3 = document.getElementById('parte3');
    document.getElementById('puntero3').className = 'puntero';
    if ((nParte1.style.display = 'block') || (nParte2.style.display = 'block')){
        nParte1.style.display = 'none';
        nParte2.style.display = 'none';
        nParte3.style.display = 'block';
    }
}