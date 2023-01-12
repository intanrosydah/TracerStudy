<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\AlumniAngkatan;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ListAlumniController extends Controller
{
    public function ListDataAlumni2019(Request $request)
    {
        $tahunAngkatan = AlumniAngkatan::where('tahun_angkatan', '2019')
            ->first()
            ->id;

        $data = User::with([
            'statusPernikahan',
            'alumniAngkatan',
            'jurusan',
            'posisiSaatIni'
            ])
            ->where('role', "user")
            ->where('id_alumni_angkatan', $tahunAngkatan)
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

        $tkj = User::where('role', 'user')->where('id_jurusan', $jurusanTkj)->where('id_alumni_angkatan', $tahunAngkatan)->count();
        $mm = User::where('role', 'user')->where('id_jurusan', $jurusanMm)->where('id_alumni_angkatan', $tahunAngkatan)->count();
        $rpl = User::where('role', 'user')->where('id_jurusan', $jurusanRpl)->where('id_alumni_angkatan', $tahunAngkatan)->count();
        $bisnis = User::where('role', 'user')->where('id_jurusan', $jurusanBisnis)->where('id_alumni_angkatan', $tahunAngkatan)->count();

        return view('list-alumni-2019', [
            'data' => $data,
            'tkj' => $tkj,
            'multimedia' => $mm,
            'rpl' => $rpl,
            'bisnis' => $bisnis
        ]);
    }
}
