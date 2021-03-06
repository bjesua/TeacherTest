/*  Version 1.1.1  Jesua Sagastume bjesua@gmail.com 2018 */
/*  git: https://github.com/bjesua/TeacherTest */

function setAlumno() {
    $.ajax({
        url: "setAlumno",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            mid: $("#mid").val(),
            nombre: $("#nombre").val()
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Alumno guardado");
                location.reload();
            }
        }
    });

}

function getAlumno() {

    var h = '';

    $.ajax({
        url: "getAlumno",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            mid: $("#mid").val(),
            nombre: $("#nombre").val()
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            h += '<table class="table table-bordered">';
            h += '<thead>';
            h += '<tr>';
            h += ' <th>Carné</th>';
            h += '<th>Nombre Alumno</th>';
            h += '<th>Acciones</th>';
            h += '</tr>';
            h += '</thead>';
            h += '<tbody>';
            for (k in data) {

                h += '<tr>';
                h += '<td>' + data[k].CARNET + '</td>';
                h += '<td>' + data[k].NOMBRE + '</td>';

                h += '<td>';
                h += '<a onclick="getEditAlumno(' + data[k].ID + ')" class="btn btn-success">';
                h += 'Editar';
                h += '</a>';
                h += '<a onclick="deleteAlumno(' + data[k].ID + ')" class="btn btn-danger">';
                h += 'Eliminar';
                h += '</a>';
                h += '</td>';
                h += '</tr>';

            }
            h += '</tbody>';
            h += '</table>';
            $("#getAlumno").html(h);
        }
    });

    // console.log(h);
}


function getEditAlumno(id) {
    $.ajax({
        url: "getEditAlumno",
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            $("#aid").val(response[0].CARNET);
            $("#anombre").val(response[0].NOMBRE);
            $("#aaid").val(response[0].ID);
        }
    });
}

function setEditAlumno() {
    $.ajax({
        url: "setEditAlumno",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $("#aaid").val(),
            carnet: $("#aid").val(),
            nombre: $("#anombre").val()
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Alumno editado");
                location.reload();
            }
        }
    });
}

function deleteAlumno(id) {
    $.ajax({
        url: "deleteAlumno",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Alumno editado");
                location.reload();
            }
        }
    });
}


function setCatedratico() {
    $.ajax({
        url: "setCatedratico",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            midCS: $("#midCS").val(),
            nombreCs: $("#nombreCs").val()
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert("Catedratico guardado");
                location.reload();
            }
        }
    });
}

function getCatedratico() {

    var h = '';

    $.ajax({
        url: "getCatedratico",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            midCS: $("#midCS").val(),
            nombreCs: $("#nombreCs").val()
        },
        dataType: "json",
        success: function (data) {
            console.log(data);
            h += '<table class="table table-bordered">';
            h += '<thead>';
            h += '<tr>';
            h += ' <th>Código</th>';
            h += '<th>Nombre </th>';
            h += '<th>Curso </th>';
            h += '<th>Facultad</th>';
            h += '<th>Acciones</th>';
            h += '</tr>';
            h += '</thead>';
            h += '<tbody>';
            for (k in data) {

                h += '<tr>';
                h += '<td>' + data[k].CODIGO_CATEDRATICO + '</td>';
                h += '<td>' + data[k].NOMBRE + '</td>';
                h += '<td>' + data[k].ID_CURSO + '</td>';
                h += '<td>' + data[k].ID_FACULTAD + '</td>';

                h += '<td>';
                h += '<a onclick="editCatedratico(' + data[k].ID + ')" class="btn btn-success">';
                h += 'Editar';
                h += '</a>';
                h += '<a onclick="deleteCatedratico(' + data[k].ID + ')" class="btn btn-danger">';
                h += 'Eliminar';
                h += '</a>';
                h += '</td>';
                h += '</tr>';

            }
            h += '</tbody>';
            h += '</table>';
            $("#getCatedratico").html(h);
        }
    });
}

function editCatedratico(id) {
    $.ajax({
        url: "editCatedratico",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            $('#codigomC').val(response[0].CODIGO_CATEDRATICO);
            $('#nombremC').val(response[0].NOMBRE);
            $('#idCatedratico').val(response[0].ID);
            $('#catFacultad').val(response[0].ID_FACULTAD);
            $('#catCurso').val(response[0].ID_CURSO);
        }
    });
}

function saveEditCat(){
    $.ajax({
        url: "saveEditCat",
        method: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            codigo_catedratico: $('#codigomC').val(),
            nombre: $('#nombremC').val(),
            id: $('#idCatedratico').val(),
            id_facultad: $('#catFacultad').val(),
            id_curso: $('#catCurso').val()
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Catedratico editado...");
                location.reload();
            }
        }
    });
}

function deleteCatedratico(id) {
    $.ajax({
        url: "deleteCatedratico",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                alert("Catedratico eliminado");
                location.reload();
            }
        }
    });
}

function editarUsuario(id) {
    $.ajax({
        url: "getEditarUsuario",
        method: "get",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            $("#name").val(response[0].name);
            $("#email").val(response[0].email);
            $("#UidUsuario").val(response[0].id);
        }
    });
}

function actualizarUsuario() {
    $.ajax({
        url: "actualizarUsuario",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: $("#UidUsuario").val(),
            nombre: $("#name").val(),
            correo: $("#email").val(),
            clave: $("#password").val()
        },
        dataType: "json",
        success: function (response) {
            console.log(response);
            if (response == 1) {
                alert("Usuario Actualizado");
                location.reload();
            }
        }
    });
}



