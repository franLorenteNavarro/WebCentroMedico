'use strict';

function mostrarAlertaBaja(DNI) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'estilo-boton boton-success',
      cancelButton: 'estilo-boton boton-eliminar'
    },
    buttonsStyling: false
  })
  
  swalWithBootstrapButtons.fire({
    title: '¿ELIMINAR USUARIO?',
    text: "¡Se dará de baja el usuario seleccionado!",
    icon: 'warning',
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonText: '¡Sí, dar de baja!',
    cancelButtonText: '¡No, denegar baja!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      let botonSubmit = document.getElementById(`inpBaja${DNI}`);
      botonSubmit.click();
    } else if (
      result.dismiss === Swal.DismissReason.cancel
    ) {
      let botonSubmit2 = document.getElementById(`inpDenegarBaja${DNI}`);
      botonSubmit2.click();
    }
  })
}