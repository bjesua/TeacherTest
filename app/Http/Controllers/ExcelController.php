<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\UsersExport;


use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportUsers(){

    }

    public function importUsers(Request $request)
    {
        \Excel::load($request->excel, function($reader) {

            $excel = $reader->get();

            // iteracción
            $reader->each(function($row) {

                $user = new User;
                $user->name = $row->nombre;
                $user->email = $row->email;
                $user->password = bcrypt('secret');
                $user->save();

            });

        });

        return "Terminado";
    }



}