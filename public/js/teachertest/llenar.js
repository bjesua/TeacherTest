function llenar() {
    var final = [];
    var final2 = [];
    var op = '';
    var actual = 0;
    $(".rTexto").each(function () {
        // console.log(this.id);
        var valor = this.id;
        var res = valor.split("-");
        if (res[2] == 'pregunta') {
            var obj = {
                tipo:1,
                pregunta: res[1],
                respuesta: $("#" + this.id).val()
            };
            final.push(obj);
        }
    });

    var arr = [];
    var ob = {};
    $(".checkeds").each(function () {
        var valor = this.id;
        var res = valor.split("-");
        $(('#' + this.id + " > div > input")).each(function () {
            // console.log(this.id);
            var valor1 = this.id;
            var res1 = valor1.split("-");
            if ($('#' + this.id).is(':checked') == true) {
                  // console.log(this.id+' - '+ res1[2] +" - "+ res[1]);
                // op += res1[2]+"-";
                op += "1-";
                // arr[res1[2]] = 1;
            }else{
                op += "0-";
            }
            // console.log($('#' + this.id).is(':checked') + " - " + res[1]);
        });

        var res1 = op.split("-");
        console.log(res1);
        var obj1 = {
            tipo:2,
            pregunta: res[1],
            respuesta:res1
        };
        op = '';

        final.push(obj1);
    });
    console.log(final);

    $.ajax({
        url: "/guardarDatosForm",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            final:final,
            noCarnet:$("#noCarnet").val(),
            codCate:$("#codCate").val(),
            codCurso:$("#codCurso").val()
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Gracias por tus respuestas!");
                window.history.back();
            }else{
                alert("Ya no puedes responder!");
                window.history.back();
            }
        }
    });

}
