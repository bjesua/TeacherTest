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
}