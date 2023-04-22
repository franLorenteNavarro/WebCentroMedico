<script>
    'use strict';
    
    const hoy = new Date();
    const diaActual = <?php echo (int)date('d'); ?>;
    const mesActual = <?php echo (int)date('m'); ?>;
    const añoActual = <?php echo (int)date('Y'); ?>;
    const fechaActual = `${añoActual}-${mesActual}-${diaActual}`;
    const horaActual = '<?php echo date('H:i'); ?>';
    const cabeceraDias = document.getElementById('indiceTabla');
    const cabeceraDias2 = document.getElementById('indiceTabla2');
    const mesYAño = document.getElementById("mesYAño");
    const mesYAño2 = document.getElementById("mesYAño2");
    const tbl = document.getElementById("cuerpoTabla");
    const tbl2 = document.getElementById("cuerpoTabla2");

    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    const dias = ["L", "M", "X", "J", "V", "S", "D"];
    const horas = [
        '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45',
        '12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45'
    ];

    crearCalendario(mesActual-1, añoActual,cabeceraDias,tbl,mesYAño);
    crearCalendario(mesActual, añoActual, cabeceraDias2,tbl2,mesYAño2);
    
    function crearCalendario(mes, year,cabeceraDias,tbl,mesYAño) {
        
        const nTr = document.createElement('tr');
        cabeceraDias.appendChild(nTr);
    for (let dia in dias) {
        let nTh= document.createElement("th");
        nTh.setAttribute("diaSemana", dias[dia]);
        let diaInfo = document.createTextNode(dias[dia]);
        nTh.appendChild(diaInfo);        
        nTr.appendChild(nTh);
    }
        const nPrimerDia = (new Date(year, mes)).getDay() - 1;
        
        const mesYAñoInfo = document.createTextNode(meses[mes] + " " + year);
        mesYAño.appendChild(mesYAñoInfo);

        let date = 1;
        for (let i = 0; i < 6; i++) {
            const fila = document.createElement("tr");
            let celda = null;
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < nPrimerDia) {
                        let celda = document.createElement("td");
                        let celdatexto = document.createTextNode('');
                        celda.appendChild(celdatexto);
                        fila.appendChild(celda);
                } else if (date > daysInMonth(mes, year)) {
                    break;

                } else {
                    celda = document.createElement("td");
                    celda.setAttribute("datoFecha", date);
                    celda.setAttribute("datoMes", mes + 1);
                    celda.setAttribute("data-year", year);
                    celda.setAttribute("datoMesNombre", meses[mes]);
                    celda.setAttribute("id", `${year}-${mes+1}-${date}`);
                    celda.className = "FechaSeleccionada";
                    let nSpan = document.createElement('span');
                    let numero = document.createTextNode(date);
                    nSpan.appendChild(numero);
                    celda.appendChild(nSpan);
                    celda.setAttribute("dia-semana", j);
                    
                    
                    if (j != 5 && j != 6) {
                        if (year >= hoy.getFullYear()) {
                            if (mes > hoy.getMonth()) {
                                celda.setAttribute("onClick", "diaSeleccionado(this), diaSeleccionado2(this.id), mostrarForm()");
                            } else if ((mes === hoy.getMonth() && date >= hoy.getDate())){
                                celda.setAttribute("onClick", "diaSeleccionado(this), diaSeleccionado2(this.id), mostrarForm()");
                            }
                        }
                    }
                    if (year <= hoy.getFullYear()) {
                        if (mes < hoy.getMonth()) {
                            celda.className = "FechaSeleccionada diaPasado";
                        } else if (mes === hoy.getMonth() && date < hoy.getDate()){
                            celda.className = "FechaSeleccionada diaPasado";
                        }
                    }
                    if (date === hoy.getDate() && year === hoy.getFullYear() && mes === hoy.getMonth()) {
                        celda.className = "FechaSeleccionada tDiaSeleccionado";
                    }
                    date++;
                    fila.appendChild(celda);
                    tbl.appendChild(fila);
                }
            }
        }
    }

    function daysInMonth(iMonth, iYear) {
        return 32 - new Date(iYear, iMonth, 32).getDate();
    }

    function diaSeleccionado(e) {
        let dia = e.getAttribute("datoFecha");
        let mes = e.getAttribute("datoMes");
        let año = e.getAttribute("data-year");
        let fechaSeleccionada = `${año}-${mes}-${dia}`;        
        rellenarCitasMedico(fechaSeleccionada);
    }

    var fechaSeleccionada = '';
    function diaSeleccionado2(e) {
        fechaSeleccionada = e;
    }

    function rellenarCitasMedico(fechaSeleccionada) {
        console.log(fechaSeleccionada);
        const url = `./apiMedicos/index.php?fecha=${fechaSeleccionada}`;
        fetch(url)
            .then(response => response.json())
            .then(rellenarArrayCitas)
            .catch(console.log);
    }

    function rellenarArrayCitas({citas_disponibles}) {   
        let horasOcupadas = [];
        for (let cita of citas_disponibles) {
            horasOcupadas.push(cita.hora);
        }
        pintarCitas(horasOcupadas);
    }

    //VALIDAR EL FORMULARIO//
    function validateForm() {
        var hora = document.forms["formCitas"]["horasDisponibles"].value;
        if (hora == '') {
            Swal.fire({
                toast: true,
                position: 'bottom-end',
                icon: 'error',
                title: 'Error',
                text: '¡Debe seleccionar una cita!'
            });
            return false;
        } else {
            return true;
        }
    }
    //VALIDAR EL FORMULARIO//

    function pintarCitas(horasOcupadas) {

        if (document.querySelector('.contenedorForm') != null) {
            document.querySelector('.contenedorForm').remove();
        }  

        const nDia1 = document.querySelector('.dSeleccionado');
        if (nDia1 != null) {
            nDia1.classList.remove('dSeleccionado');
        }

        const nDia2 = document.getElementById(fechaSeleccionada);
        nDia2.classList.add('dSeleccionado');

        const nMain = document.querySelector('main');

        const nDivForm = document.createElement('div');
        nDivForm.className = 'contenedorForm';
        nMain.appendChild(nDivForm);
        
        const nDivAtras = document.createElement('div');
        nDivAtras.setAttribute('class', 'contenedorAtras');
        nDivForm.appendChild(nDivAtras);
        
        const nImgAtras = document.createElement('img');
        nImgAtras.setAttribute('src', '../general/menu/imagenes/cambiarFlecha.png');
        nDivAtras.setAttribute('onclick', 'mostrarCalendario()');
        nDivAtras.appendChild(nImgAtras);

        const nForm = document.createElement('form');
        nForm.setAttribute('name', 'formCitas');
        nForm.setAttribute('action', '<?php echo $_SERVER["PHP_SELF"] ?>');
        nForm.setAttribute('onsubmit', 'return validateForm()');
        nForm.setAttribute('method', 'POST');
        nDivForm.appendChild(nForm);
        
        const nContenedorCita = document.createElement('div');
        nContenedorCita.className = 'contenedorCitas';
        nForm.appendChild(nContenedorCita);

        for(let hora in horas) {
            let nCita = document.createElement('div');
            nCita.setAttribute('class', 'cita');
            nCita.setAttribute('fechaSeleccionada', fechaSeleccionada);
            nCita.setAttribute('horaCita', horas[hora]);
            let nRadio = document.createElement('input');
            nRadio.setAttribute('name', 'horasDisponibles');
            nRadio.setAttribute('type', 'radio');
            nRadio.setAttribute('value', horas[hora]);
            nRadio.setAttribute('id', horas[hora]);
            nRadio.setAttribute('onChange', 'chequearRadio(this)');
            let nLabel = document.createElement('label');
            nLabel.setAttribute('for', horas[hora]);
            nLabel.setAttribute('id', `tL${horas[hora]}`);
            let nTexto = document.createTextNode(horas[hora]);
            nLabel.appendChild(nTexto);
            nCita.appendChild(nRadio);
            nCita.appendChild(nLabel);
            nContenedorCita.appendChild(nCita);           

            for (let horaOcupada of horasOcupadas) {
                if ( horaOcupada === horas[hora]){
                    nCita.classList.add('ocupado');
                    document.getElementById(horas[hora]).disabled = true;                                    
                }              
            }

            if (nCita.getAttribute('fechaSeleccionada') === fechaActual) {
                if (nCita.getAttribute('horaCita') <= horaActual) {
                    nCita.classList.add('ocupado');
                    document.getElementById(horas[hora]).disabled = true;
                }                                
            }                                      
        }  
            

        const nDivBoton = document.createElement('div');
        nDivBoton.className = 'contenedorBoton';
        nForm.appendChild(nDivBoton);

        const nHidden = document.createElement('input');
        nHidden.setAttribute('type', 'hidden');
        nHidden.setAttribute('name', 'fechaSeleccionada');
        nHidden.setAttribute('value', fechaSeleccionada);
        nDivBoton.appendChild(nHidden);

        const nSubmit = document.createElement('input');
        nSubmit.setAttribute('type', 'submit');
        nSubmit.setAttribute('name', 'pedirCita');
        nSubmit.className = 'estilo-boton boton-principal';
        nSubmit.setAttribute('value', 'Pedir Cita');
        nDivBoton.appendChild(nSubmit);
    }
    
    function chequearRadio(e){
        let nLabel = document.getElementById(`tL${e.id}`);
        for(let hora in horas){
            document.getElementById(`tL${horas[hora]}`).classList.remove('tRadSeleccionado');
        }
        nLabel.classList.add('tRadSeleccionado');
    }
    function mostrarForm(){
        var mediaqueryList = window.matchMedia("(max-width: 450px)");
        var mediaqueryList = window.matchMedia("(max-width: 450px)");
        if(mediaqueryList.matches) {
            const calendario = document.querySelector('.contenedorCalendario');
            calendario.style.transform = 'translateY('+ 150 +'%)';
            calendario.style.transition = 'all 400ms ease-out';
            const nDivFormulario = document.querySelector('.contenedorForm');
            setTimeout(function() {
            calendario.style.display = 'none';
            },400);
        
        }
    }
    function mostrarCalendario(){
        const calendario = document.querySelector('.contenedorCalendario');
        const nDivFormulario = document.querySelector('.contenedorForm');
        calendario.style.display = 'block';
        nDivFormulario.style.zIndex = "3";
        calendario.style.zIndex = "2";
        calendario.style.transform = 'translateY('+ 150 +'%)';
        nDivFormulario.style.transform = 'translateY('+ 150 +'%)';
        nDivFormulario.style.transition = 'all 400ms ease-out';        
        const nDivMostrarFormulario = document.createElement('div');
        nDivMostrarFormulario.setAttribute('class', 'contenedorMostrarForm');
        calendario.appendChild(nDivMostrarFormulario);
        const nImg = document.createElement('img');
        nImg.setAttribute('src', '../general/menu/imagenes/cambiarFlecha.png');
        nDivMostrarFormulario.setAttribute('onclick', 'alternarCalendarioYFormulario()');
        nDivMostrarFormulario.appendChild(nImg);
        setTimeout(function() {
        nDivFormulario.style.display = 'none';
        calendario.style.zIndex = "3";
        nDivFormulario.style.zIndex = "2";
        calendario.style.transform = 'translateY('+ 0 +'px)';
        },400);
    }
    function alternarCalendarioYFormulario(){
        if(document.querySelector('.contenedorMostrarForm')){
            document.querySelector('.contenedorMostrarForm').remove();
        }
        const calendario = document.querySelector('.contenedorCalendario');
        const nDivFormulario = document.querySelector('.contenedorForm');
        nDivFormulario.style.display = 'block';
        nDivFormulario.style.transform = 'translateY('+ 150 +'%)';
        calendario.style.transform = 'translateY('+ 150 +'%)';
        nDivFormulario.style.transition = 'all 400ms ease-out';
        setTimeout(function() {
        nDivFormulario.style.transform = 'translateY('+ 0 +'px)';
        calendario.style.display = 'none';
        },400);
    }
</script>