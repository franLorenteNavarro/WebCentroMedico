'use strict';

function mostrarAlertaCita(idCita) {
    Swal.fire({
        title: '¿CANCELAR CITA?',
        text: "¡Se cancelará la cita seleccionada!",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#ff4444',
        cancelButtonText: 'No',
        confirmButtonColor: '#00C851',
        confirmButtonText: '¡Sí, cancelar cita!',
        allowEnterKey: false
      }).then((result) => {
        if (result.value) {
          let botonSubmit = document.getElementById(`formCita${idCita}`);
          botonSubmit.click();
        }
      })
}