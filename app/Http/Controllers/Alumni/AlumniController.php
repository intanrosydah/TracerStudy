<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Datatables;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $data = Alumni::get();
        if ($request->ajax()) {
            return datatables()->of($data)
                ->addColumn('Aksi', function($data) {
                    $button =  "<button class='btn btn-primary' id='".$data->id."'>Edit</button>";
                    $button .=  "<button class='btn btn-danger' id='".$data->id."'>Hapus</button>";
                    return $button;
                })
                ->rawColumns(['Aksi'])
                ->make(true);
        }
        return view('alumni');
    }
}
