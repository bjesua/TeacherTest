<?php
/**
 * Created by PhpStorm.
 * User: bjesua
 * Date: 9/27/18
 * Time: 12:56 p.m.
 */


namespace App\Http\Controllers;


use Illuminate\Http\Request;

//use App\UsersExport;


use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\Storage;

use App\Item;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\TestModelos\Alumnos as alumnos;
use App\TestModelos\Catedratico as catedratico;
use App\TestModelos\Usuarios as usuarios;
use App\TestModelos\Preguntas as preguntas;
use App\TestModelos\AsignarPreguntas as asignapreguntas;
use App\TestModelos\ProfesorCursoAlumno as profesorcursoalumno;
use App\TestModelos\Respuestas as respuestas;

class TestController extends Controller
{
    protected function setAlumno(Request $request)
    {
        $datos = $request->all();
        $inserta = alumnos::insert(["CARNET" => $datos["mid"], "NOMBRE" => $datos["nombre"]]);
        return 1;
    }

    protected function getAlumno()
    {
        $alumnos = alumnos::get();
        return response()->json($alumnos);
    }

    protected function getEditAlumno(Request $request)
    {
        $datos = $request->all();
        $alumnos = alumnos::WHERE([["ID", "=", $datos["id"]]])->get();
        return response()->json($alumnos);
    }

    protected function setEditAlumno(Request $request)
    {
        $datos = $request->all();
        $update = alumnos::WHERE("ID", $datos["id"])->UPDATE(
            ['CARNET' => $datos['carnet'], 'NOMBRE' => $datos['nombre']]
        );
        return 1;
    }

    protected function deleteAlumno(Request $request)
    {
        $datos = $request->all();
        $deletedRows = alumnos::where('ID', $datos["id"])->delete();
        return 1;
    }


    protected function setCatedratico(Request $request)
    {
        $datos = $request->all();
        $inserta = catedratico::insert(["CODIGO_CATEDRATICO" => $datos["midCS"], "NOMBRE" => $datos["nombreCs"]]);
        return 1;
    }

    protected function getCatedratico()
    {
        $catedratico = catedratico::get();
        return response()->json($catedratico);
    }

    protected function editCatedratico(Request $request)
    {
        $data = $request->all();
        $catedratico = catedratico::WHERE('ID', '=', $data['id'])->get();
        return response()->json($catedratico);
    }

    protected function saveEditCat(Request $request)
    {
        $datos = $request->all();
        $update = catedratico::WHERE("ID", $datos["id"])->UPDATE(
            ['ID_FACULTAD' => $datos['id_facultad'], 'ID_CURSO' => $datos['id_curso'], 'CODIGO_CATEDRATICO' => $datos['codigo_catedratico'], 'NOMBRE' => $datos['nombre']]
        );
        return 1;
    }

    protected function deleteCatedratico(Request $request)
    {
        $datos = $request->all();
        $deletedRows = catedratico::where('ID', $datos["id"])->delete();
        return 1;
    }

    protected function getMantUsuarios()
    {
        $usuarios = usuarios::get();
        return view('evaluacion.mantUsuarios', ['usuarios' => $usuarios]);
//        return response()->json($alumnos);
    }

    protected function getEditarUsuario(Request $request)
    {
        $data = $request->all();
        $usuarios = usuarios::where('id', '=', $data['id'])->get();
//        return view('evaluacion.mantUsuarios', ['usuarios' => $usuarios]);
        return response()->json($usuarios);
    }

    protected function actualizarUsuario(Request $request)
    {
        $datos = $request->all();
        $update = alumnos::WHERE("id", $datos["id"])->UPDATE(
            ['name' => $datos['nombre'], 'email' => $datos['correo'], 'password' => Hash::make($datos['clave'])]
        );
        return 1;
    }

    protected function create(Request $request)
    {
        $data = $request->all();
//        print_r($data);
        $usuario = User::where('email', "=", $data['email'])->get();
//        print_r($usuario);

        if (count($usuario) > 0) {
            User::where('id', "=", $data['UidUsuario'])->update(['name' => $data['name'], 'email' => $data['email'], 'password' => Hash::make($data['password'])]);
        } else {
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        }
        return redirect('/mantUsuarios');
    }


    protected function mantPreguntas()
    {
        $preguntas = preguntas::orderBy('ID', 'desc')->get();
        $profesorcursoalumno = DB::select(DB::raw("
        select CODIGO_CARRERA, NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO
        from CARGA_PROFESOR_CURSO_ALUMNOS group by CODIGO_CARRERA,NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO"));
        return view('evaluacion.mantenimientoPreguntas', ['data' => array('preguntas' => $preguntas, 'profesores' => $profesorcursoalumno)]);
//        return view('evaluacion.mantenimientoPreguntas');
    }

    protected function llenar($codigo_curso, $cod_catedratico)
    {

//        $preguntas = preguntas::orderBy('ID', 'desc')->get();
//        $profesorcursoalumno = DB::select(DB::raw("
//        select CODIGO_CARRERA, NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO
//        from CARGA_PROFESOR_CURSO_ALUMNOS group by CODIGO_CARRERA,NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO") );
//        return view('evaluacion.mantenimientoPreguntas', ['data' => array('preguntas' => $preguntas, 'profesores'=> $profesorcursoalumno)]);
        return view('evaluacion.llenar');
    }

    protected function registrarCarnet(Request $request)
    {
        $datos = $request->all();
        $cursos = profesorcursoalumno::where("CARNET", 'like', $datos['noCarnet'])->get();
        return view('evaluacion.llenar', ['data' => array('cursos' => $cursos)]);
    }

    protected function calificar($curso, $catedratico, $carnet)
    {
//        echo $curos . " - " . $catedratico . " - " . $carnet;
        $preguntas = preguntas::get();
        return view('evaluacion.llenar', ['data' => array('calificar' => 1, 'preguntas' => $preguntas, 'curso' => $curso, 'catedratico' => $catedratico, 'carnet' => $carnet)]);
    }

    protected function configView()
    {
        return view('evaluacion/mantenimiento');
    }

    protected function guardarDatosForm(Request $request)
    {

        $data = $request->all();

        $noCarnet = $data['noCarnet'];
        $codCate = $data['codCate'];
        $codCurso = $data['codCurso'];

        $validaResp = respuestas::WHERE([['NUMERO_CARNET','=',$noCarnet],['CODIGO_CURSO','=',$codCurso],['CODIGO_CATEDRATICO','=',$codCate]])->get();
        if(count($validaResp)>0){
            return 0;
        }


        foreach ($data['final'] as $k => $v) {
            if ($v['tipo'] == 1) {
                $insert[] = ['NUMERO_CARNET' => $noCarnet, 'CODIGO_CURSO' => $codCurso, 'CODIGO_CATEDRATICO' => $codCate, 'ID_PREGUNTA' => $v['pregunta'], 'RESPUESTA' => $v['respuesta']];
            } else if ($v['tipo'] == 2) {
                $insert1[] = [
                    'NUMERO_CARNET' => $noCarnet,
                    'CODIGO_CURSO' => $codCurso,
                    'CODIGO_CATEDRATICO' => $codCate,
                    'ID_PREGUNTA' => $v['pregunta'],
                    'OPCION1' => ($v['respuesta'][0]),
                    'OPCION2' => ($v['respuesta'][1]),
                    'OPCION3' => ($v['respuesta'][2]),
                    'OPCION4' => ($v['respuesta'][3])
                ];
            }
        }
        $inserta = respuestas::insert($insert);
        $inserta1 = respuestas::insert($insert1);
        if ($inserta && $inserta1) {
            return 1;
        } else {
            return 2;
        }
    }

    protected function deletePreguntas()
    {
        preguntas::truncate();
        return back();
    }

    protected function charts()
    {
        $carrera = DB::select(DB::raw("SELECT DISTINCT CODIGO_CARRERA,NOMBRE_CARRERA FROM CARGA_PROFESOR_CURSO_ALUMNOS"));
        return view('evaluacion.charts', ['data' => array('carreras' => $carrera)]);
    }

    protected function getCatedraticosCarrera($codigo_carrera)
    {
        $carrera = DB::select(DB::raw("SELECT DISTINCT CODIGO_CARRERA,NOMBRE_CARRERA FROM CARGA_PROFESOR_CURSO_ALUMNOS"));

        $cursos = DB::select(DB::raw("select CODIGO_CARRERA, NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO
                  from CARGA_PROFESOR_CURSO_ALUMNOS
                  where CODIGO_CARRERA = '" . $codigo_carrera . "'
                  group by CODIGO_CARRERA,NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO"));

        return view('evaluacion.charts', ['data' => array('carreras' => $carrera, 'cursos' => $cursos)]);
    }

    protected function getCatedraticosCharts($codigo_carrera, $codigo_curso)
    {
        $carrera = DB::select(DB::raw("SELECT DISTINCT CODIGO_CARRERA,NOMBRE_CARRERA FROM CARGA_PROFESOR_CURSO_ALUMNOS"));

        $cursos = DB::select(DB::raw("select CODIGO_CARRERA, NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO
                  from CARGA_PROFESOR_CURSO_ALUMNOS
                  where CODIGO_CARRERA = '" . $codigo_carrera . "'
                  group by CODIGO_CARRERA,NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO"));

        $catedratico = DB::select(DB::raw("select CODIGO_CARRERA, NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO
                  from CARGA_PROFESOR_CURSO_ALUMNOS
                  where CODIGO_CURSO = '" . $codigo_curso . "'
                  group by CODIGO_CARRERA,NOMBRE_CARRERA, CODIGO_CURSO, NOMBRE_CURSO, CODIGO_CATEDRATICO, NOMBRE_CATEDRATICO"));

        $preguntas = preguntas::get(['ID']);

        return view('evaluacion.charts', ['data' => array('carreras' => $carrera, 'cursos' => $cursos, 'catedratico' => $catedratico, 'preguntas' => $preguntas)]);
    }

    protected function chartPie(Request $request)
    {
        $data = $request->all();
//        print_r($data);
        $datos = DB::select(DB::raw("           
        SELECT * FROM (
        SELECT R.ID_PREGUNTA,
        GROUP_CONCAT(RESPUESTA SEPARATOR ', ') AS RESPUESTAS,
               SUM(R.OPCION1) AS OP1,
               SUM(R.OPCION2) AS OP2,
               SUM(R.OPCION3) AS OP3,
               SUM(R.OPCION4) AS OP4
        FROM RESPUESTAS R
        WHERE R.CODIGO_CATEDRATICO = '".$data['codigo_catedratico']."'
        GROUP BY ID_PREGUNTA) AS T , PREGUNTAS P
        WHERE T.ID_PREGUNTA = P.ID
            "));

//        print_r($datos);
        return response()->json($datos);
    }
}