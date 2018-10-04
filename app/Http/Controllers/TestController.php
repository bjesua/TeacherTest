<?php

namespace App\Http\Controllers;
namespace App;
use DB;
use App\Http\Requests;
use App\TestModelos\Alumnos as alumnos;

class TestController extends Controller
{
    //

    public function getAlumnos(){
        $queryCarrera = alumnos::all();
        return $queryCarrera;
    }

    
}
