<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\AlumniAngkatan;
use App\Models\Jurusan;
use App\Models\PosisiSaatIni;
use App\Models\StatusPernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormAlumniController extends Controller
{
    public function index()
    {
        // if (Auth::user()->role == 'User') {
            $statusPernikahan = StatusPernikahan::all();
            $alumniAngkatan = AlumniAngkatan::all();
            $jurusan = Jurusan::all();
            $posisSaatIni = PosisiSaatIni::all();

            return view('form-alumni', [
                'status_pernikahan' => $statusPernikahan,
                'alumni_angkatan' => $alumniAngkatan,
                'jurusan' => $jurusan,
                'posisi_saat_ini' => $posisSaatIni,
            ]);
        // }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_status_menikah' => $request->status_pernikahan,
                'id_alumni_angkatan' => $request->alumni_angkatan,
                'id_jurusan' => $request->jurusan,
                'id_posisi_saat_ini' => $request->posisi_saat_ini,
                'nama_instansi' => $request->nama_instansi,
                'bidang_instansi' => $request->bidang_instansi,
                'posisi_pekerjaan' => $request->posisi_pekerjaan,
                'alamat_lengkap' => $request->alamat_lengkap,
            ];

            $result = Alumni::create($data);

            DB::commit();

            return redirect()->route('form-alumni');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
