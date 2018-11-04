var h = '';
var contador = 1;
$( document ).ready(function() {

    $( "#tipoDePregunta" ).change(function() {
        if(this.value == 1){
            h += '<div class="form-group">\n' +
                '    <label for="formGroupExampleInput" id="preguntaGenText-'+ contador +'">'+$("#pPregunta").val()+'</label>\n' +
                '    <input type="text" class="form-control" id="inputPregunta-'+ contador +'" >\n' +
                '</div>';
            contador++;
        }else if(this.value == 2){
            h += '<div class="custom-control custom-checkbox">\n' +
                '    <label for="formGroupExampleInput" id="preguntaGenText-'+ contador +'">'+$("#pPregunta").val()+'</label>\n' +
                '                        <input type="checkbox" class="custom-control-input" id="customCheck1">\n' +
                '                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>\n' +
                '                    </div>';
            contador++;
        }else if(this.value == 3){

        }
    });

    $( "#generaPregunta" ).click(function() {
        console.log(h);
        // console.log($("#pPregunta").val());
        // console.log($("#pPregunta").val());
        $("#printForm").append(h);
        h ='';
    });

});