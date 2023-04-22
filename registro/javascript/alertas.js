<script>
function validateForm() {
    var nombre = document.forms["formRegistro"]["nombre"].value;
    var patronNombre = /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/;

    var apellidos = document.forms["formRegistro"]["apellidos"].value;
    var patronApellidos = /^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/;

    var fechaNacimiento = document.forms["formRegistro"]["fechaNacimiento"].value;
    var patronFechaNacimiento = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})$/;

    var email = document.forms["formRegistro"]["email"].value;
    var patronEmail = /^[\w]+@{1}[\w]+\.[a-z]{2,3}$/;

    var telefono = document.forms["formRegistro"]["telefono"].value;
    var patronTelefono = /^(6|7)[ -]*([0-9][ -]*){8}$/;

    var direccion = document.forms["formRegistro"]["direccion"].value;

    var DNI = document.forms["formRegistro"]["DNI"].value;
    
    var contraseña = document.forms["formRegistro"]["contraseña"].value;
    var confirmarContraseña = document.forms["formRegistro"]["confirmarContraseña"].value;


    if (nombre == "") {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡El nombre no puede estar vacío!'
      });
      return false;     
    } else if (patronNombre.test(nombre)==false) {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡El nombre no es válido!'
      });
      return false;
    } else if (nombre.length <3 || nombre.length >50) {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡El nombre debe estar comprendido entre 3 y 50 caracteres!'
      });
      return false;
    } else if (apellidos == "") {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡Los apellidos no pueden estar vacíos!'
      });
      return false;   
    } else if (patronApellidos.test(apellidos)==false) {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡Los apellidos no son válidos!'
      });
      return false;
    } else if (apellidos.length <3 || apellidos.length >100) {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡Los apellidos deben estar comprendidos entre 3 y 100 caracteres!'
      });
      return false;
    } else if (fechaNacimiento=="") {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡La fecha de nacimiento no puede estar vacía!'
      });
      return false;
    } else if (patronFechaNacimiento.test(fechaNacimiento)==false) {
      Swal.fire({
        toast: true,
        position: 'bottom-end',
        icon: 'error',
        title: 'Error',
        text: '¡La fecha de nacimiento no es válida!'
      });
      return false;   
    } 
    else {
      document.querySelector('.swal2-popup').style.display = 'none';
      document.getElementById('puntero2').className = 'puntero';
      document.getElementById('puntero3').classList.remove('puntero');
      document.getElementById('parte1').style.display = 'none';      
      document.getElementById('parte2').style.display = 'block';
      
      if (email == "") {
        Swal.fire({
          toast: true,
          position: 'bottom-end',
          icon: 'error',
          title: 'Error',
          text: '¡El email no puede estar vacío!'
        });
        return false;
      } else if (patronEmail.test(email)==false) {
          Swal.fire({
            toast: true,
            position: 'bottom-end',
            icon: 'error',
            title: 'Error',
            text: '¡El email no es válido!'
          });
          return false;
      } else if (telefono == "") {
        Swal.fire({
          toast: true,
          position: 'bottom-end',
          icon: 'error',
          title: 'Error',
          text: '¡El teléfono no puede estar vacío!'
        });
        return false;
      } else if (patronTelefono.test(telefono)==false) {
          Swal.fire({
            toast: true,
            position: 'bottom-end',
            icon: 'error',
            title: 'Error',
            text: '¡El teléfono no es válido!'
          });
          return false;
      } else if (direccion=="") {
          Swal.fire({
            toast: true,
            position: 'bottom-end',
            icon: 'error',
            title: 'Error',
            text: '¡La dirección no puede estar vacía!'
          });
          return false;
      } else {
          document.querySelector('.swal2-popup').style.display = 'none';
          document.getElementById('puntero3').className = 'puntero';
          document.getElementById('parte2').style.display = 'none';      
          document.getElementById('parte3').style.display = 'block';
          
          if (DNI == "") {
            Swal.fire({
              toast: true,
              position: 'bottom-end',
              icon: 'error',
              title: 'Error',
              text: '¡El DNI no puede estar vacío!'
            });
            return false;
          } else if (DNI.length !=9) {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: 'Error',
                text: '¡El DNI debe de ser de nueve dígitos!'
              });
              return false;
          } else if (contraseña == "" || confirmarContraseña == "") {
              Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: 'Error',
                text: '¡La contraseña no puede estar vacía!'
              });
              return false;
          } else if (contraseña.length <6) {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: 'Error',
                text: '¡La contraseña debe ser superior a 6 dígitos!'
              });
              return false;
          } else if (contraseña != confirmarContraseña) {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: 'Error',
                text: '¡Las contraseñas no coinciden!'
              });
              return false;
          } else {
            return true;
          }        
      }  
    }
    
  }
</script>