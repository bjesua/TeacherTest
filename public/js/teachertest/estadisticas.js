function getEstadisticas(codigo_catedratico) {
    $.ajax({
        url: "/chartPie",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            codigo_catedratico: codigo_catedratico
        },
        dataType: "json",
        success: function (data) {
            for (key in data) {
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                if (data[key].TIPO_COMPONENTE == 1) {
                    fin = [
                        ['Opcion', 'Respuestas'],
                        [data[key].OPCION1, parseInt(data[key].OP1, 10)],
                        [data[key].OPCION2, parseInt(data[key].OP2, 10)],
                        [data[key].OPCION3, parseInt(data[key].OP3, 10)],
                        [data[key].OPCION4, parseInt(data[key].OP4, 10)]
                    ];
                    var data1 = google.visualization.arrayToDataTable(fin);
                    var options = {
                        title: data[key].ID + '). ' + data[key].PREGUNTA
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('pregunta' + data[key].ID));
                    chart.draw(data1, options);
                } else {
                    var obj = data[key].RESPUESTAS;
                    var spl = obj.split(',');
                    var h = '';
                    h += '<br><div class="col-md-6" style="margin-left: 100px;">';
                    h += '<b>'+data[key].ID + '). ' + data[key].PREGUNTA+'</b>';
                    h += '<ul class="list-group list-group-flush">';
                    for (a in spl) {
                        h += '<li class="list-group-item">'+spl[a]+'</li>';
                    }
                    h += '</ul>';
                    h += '</div><br>';
                    $('#pregunta' + data[key].ID).html(h);
                }

            }


        }
    });

}