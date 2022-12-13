<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = User::with([
                'statusPernikahan',
                'alumniAngkatan',
                'jurusan',
                'posisiSaatIni'
                ])
                ->where('role', "user")
                ->orderBy('id', "desc")
                ->get();

            if ($request->ajax()) {
                $allData = DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);

                return $allData;
            }

            $jurusanTkj = Jurusan::where('jurusan', 'like', 'TKJ')->first()->id;
            $jurusanMm = Jurusan::where('jurusan', 'like', 'Multimedia')->first()->id;
            $jurusanRpl = Jurusan::where('jurusan', 'like', 'RPL')->first()->id;
            $jurusanBisnis = Jurusan::where('jurusan', 'like', 'Manajemen Bisnis')->first()->id;

            $tkj = User::where('role', 'user')->where('id_jurusan', $jurusanTkj)->count();
            $mm = User::where('role', 'user')->where('id_jurusan', $jurusanMm)->count();
            $rpl = User::where('role', 'user')->where('id_jurusan', $jurusanRpl)->count();
            $bisnis = User::where('role', 'user')->where('id_jurusan', $jurusanBisnis)->count();

            return view('dashboard', [
                'data' => $data,
                'tkj' => $tkj,
                'multimedia' => $mm,
                'rpl' => $rpl,
                'bisnis' => $bisnis
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
