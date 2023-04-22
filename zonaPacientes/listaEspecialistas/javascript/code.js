$(document).ready(function(){
    $('.contenedorBuscador input[type="text"]').on("keyup input", function(){

        let valorInput = $(this).val();
        let resultado = $(this).siblings(".resultado");
        if(valorInput.length){
            $.get("./sql/buscar.php", {palabra: valorInput}).done(function(data){
                resultado.html(data);
                document.getElementById('listaPrincipal').style.display='none';
            });
        } else{
            resultado.empty();
            document.getElementById('listaPrincipal').style.display='block';

        }
    });
});