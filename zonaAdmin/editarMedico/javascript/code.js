'use strict';

function mostrarAlertaBaja() {
    Swal.fire({
        title: '¿ELIMINAR MÉDICO?',
        text: "¡Se eliminará el médico seleccionado!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#ff4444',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: '#00C851',
        confirmButtonText: '¡Sí, eliminar!',
        allowEnterKey: false
    }).then((result) => {
        if (result.value) {
            let botonBaja = document.getElementById("botonBaja");
            botonBaja.click();
        }
    })
}

function liberarFormulario() {
    let inputs = document.getElementsByClassName('campo');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    document.getElementById('botonEditar').style.display = 'none';
    document.getElementById('botonGuardar').style.display = 'block';    
}