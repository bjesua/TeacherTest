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


class MaatwebsiteDemoController extends Controller
{
    public function importExport()
    {
        return view('importExport');
    }
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->title != null || $value->title != ""){
                        $insert[] = [ 'title' => $value->title, 'description' => $value->description,'created_at' => $value->created_at, 'updated_at' => $value->updated_at];
                    }
                }
                if(!empty($insert)){
                    DB::table('items')->insert($insert);
//                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }

    public function importCarrera()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->codigo_facultad != null || $value->codigo_facultad != ""){
                        $insert[] = [ 'codigo_facultad' => $value->codigo_facultad, 'descripcion' => $value->descripcion,'estado' => $value->estado];
                    }
                }
                if(!empty($insert)){
                    DB::table('CARRERA')->insert($insert);
//                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }

    public function importCursos()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->id_facultad != null || $value->id_facultad != ""){
                        $insert[] = [ 'id_facultad' => $value->id_facultad, 'codigo_facultad' => $value->codigo_facultad,'estado' => $value->estado,'descripcion' => $value->descripcion];
                    }
                }
                if(!empty($insert)){
                    DB::table('CURSOS')->insert($insert);
//                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
    public function importCatedratico()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->id_facultad != null || $value->id_facultad != ""){
                        $insert[] = [ 'id_facultad' => $value->id_facultad, 'id_curso' => $value->id_curso,'codigo_catedratico' => $value->codigo_catedratico,'nombre' => $value->nombre,'estado' => $value->estado];
                    }
                }
                if(!empty($insert)){
                    DB::table('CATEDRATICO')->insert($insert);
//                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }
    public function importAlumno()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                //
                foreach ($data as $key => $value) {
                    if($value->carnet != null || $value->carnet != ""){
                        $insert[] = [ 'carnet' => $value->carnet, 'nombre' => $value->nombre,'estado' => $value->estado];
                    }
                }
                if(!empty($insert)){
                    DB::table('ALUMNO')->insert($insert);
//                    dd('Insert Record successfully.');
                }
            }
        }
        return back();
    }

    public function importoQuestions()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->pregunta != null || $value->pregunta != ""){
                        $insert[] = [ 'PREGUNTA' => $value->pregunta, 'TIPO_COMPONENTE' => $value->tipo_componente, 'CUESTIONARIO' => $value->cuestionario];
                    }
                }
                if(!empty($insert)){
                    DB::table('PREGUNTAS')->insert($insert);
                }
            }
        }
        return back();
    }
    public function importoAsignaQuestions()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($value->cuestionario != null || $value->cuestionario != ""){
                        $insert[] = [ 'CUESTIONARIO' => $value->cuestionario, 'CODIGO_CATEDRATICO' => $value->codigo_catedratico, 'FECHA_INICIO' => $value->fecha_inicio, 'FECHA_FIN' => $value->fecha_fin];
                    }
                }
                if(!empty($insert)){
                    DB::table('ASIGNA_PREGUNTAS')->insert($insert);
                }
            }
        }
        return back();
    }

    public function importArchivoFinal()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            print_r($data);
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    if($key == 0){
                        $codigo_carrera = $value->carrera;
                        $codigo_curso = $value->codigo;
                        $codigo_catedratico = $value->catedratico;
                    }
                    if($key == 1){
                        $descripcion_carrera = $value->carrera;
                        $nombre_curso = $value->codigo;
                        $nombre_catedratico = $value->catedratico;
                    }
                    if($key >= 4){
                        $insert[] = [
                            'CODIGO_CARRERA' => trim($codigo_carrera),
                            'NOMBRE_CARRERA' => trim($descripcion_carrera),
                            'CODIGO_CURSO' => trim($codigo_curso),
                            'NOMBRE_CURSO' => trim($nombre_curso),
                            'CODIGO_CATEDRATICO' =>trim( $codigo_catedratico),
                            'NOMBRE_CATEDRATICO' => trim($nombre_catedratico),
                            'CARNET' => trim(str_replace(' ', '', $value->codigo)) ,
                            'NOMBRE_ALUMNO' => trim($value->catedratico)
                            ];
                    }
                }
//                print_r($insert);
                if(!empty($insert)){
                    DB::table('CARGA_MASIVA_EST_PREGUNTAS')->insert($insert);
                }
                echo 1;
            }
        }
//        return back();
    }

    public  function test(){
        echo "hola";
    }
}