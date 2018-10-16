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

use App\TestModelos\Alumnos as alumnos;
use App\TestModelos\Catedratico as catedratico;

class TestController extends Controller
{
    public function setAlumno(Request $request){
        $datos = $request->all();
        $inserta = alumnos::insert(["CARNET" => $datos["mid"],"NOMBRE" => $datos["nombre"]]);
        return 1;
    }
    public function getAlumno(){
        $alumnos = alumnos::get();
        return response()->json($alumnos);
    }
    public function getEditAlumno(Request $request){
        $datos = $request->all();
        $alumnos = alumnos::WHERE([["ID","=",$datos["id"]]])->get();
        return response()->json($alumnos);
    }
    public function setEditAlumno(Request $request){
        $datos = $request->all();
        $update = alumnos::WHERE("ID", $datos["id"])->UPDATE(
            ['CARNET' => $datos['carnet'], 'NOMBRE' => $datos['nombre']]
        );
        return 1;
    }
    public function deleteAlumno(Request $request){
        $datos = $request->all();
        $deletedRows = alumnos::where('ID', $datos["id"])->delete();
        return 1;
    }
    public function setCatedratico(Request $request){
        $datos = $request->all();
        $inserta = catedratico::insert(["CODIGO_CATEDRATICO" => $datos["midCS"],"NOMBRE" => $datos["nombreCs"]]);
        return 1;
    }
    public function getCatedratico(){
        $catedratico = catedratico::get();
        return response()->json($catedratico);
    }

    public function deleteCatedratico(Request $request){
        $datos = $request->all();
        $deletedRows = catedratico::where('ID', $datos["id"])->delete();
        return 1;
    }
}