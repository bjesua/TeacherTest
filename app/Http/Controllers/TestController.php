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

    protected function responderPreguntas(Request $request)
    {
        $data = $request->all();
        print_r($data);
        echo "<br>";
        $curso = $data['curso-0-0-0-0'];
        $catedratico = $data['catedratico-0-0-0-0'];
        $carnet = $data['carnet-0-0-0-0'];
        $insert = array();
        $concatOpt = '';
        $contadorConcat = 0;
        $vEstado = 0;
        foreach ($data as $k => $v) {
            if ($k != '_token') {
                $tipo = explode("-", $k);
                if ($tipo[2] == "pregunta") {
//                    $insert[] = [
//                        'NUMERO_CARNET' => $carnet,
//                        'CODIGO_CURSO' => $curso,
//                        'CODIGO_CATEDRATICO' => $catedratico,
//                        'ID_PREGUNTA' => $tipo[1],
//                        'RESPUESTAS' => $v,
//                    ];
                } else {
                    echo $tipo[4]."<br>";
                    if ($tipo[4] == 'primero') {
                        $concatOpt = '';
                        $concatOpt .= $v . ',';
                    } else if ($tipo[4] == 'segundo') {
                        $concatOpt .= $v . ',';
                    } else if ($tipo[4] == 'tercero') {
                        $concatOpt .= $v . ',';
                    } else if ($tipo[4] == 'cuarto') {
                        $concatOpt .= $v . ',';
                        $rest = substr($concatOpt, 0, -1);
                        $val = explode(",", $rest);
                        $prim = (isset($val[0])) ? $val[0] : '';
                        $seg = (isset($val[1])) ? $val[1] : '';
                        $ter = (isset($val[2])) ? $val[2] : '';
                        $cua = (isset($val[3])) ? $val[3] : '';
                        $insert[] = [
                            'NUMERO_CARNET' => $carnet,
                            'CODIGO_CURSO' => $curso,
                            'CODIGO_CATEDRATICO' => $catedratico,
                            'ID_PREGUNTA' => $tipo[1],
                            'OPCION1' => $prim ,
                            'OPCION2' => $seg,
                            'OPCION4' => $ter,
                            'OPCION3' => $cua,
                        ];
                    }
                }
            }
        }
        echo "<br>";
        print_r($insert);
//
//        $insert = respuestas::insert($insert);
    }
}