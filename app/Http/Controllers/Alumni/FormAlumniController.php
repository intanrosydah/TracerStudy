<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\AlumniAngkatan;
use App\Models\Jurusan;
use App\Models\PosisiSaatIni;
use App\Models\StatusPernikahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (Auth::user()->role === "user") {
                $dataSet = User::with([
                    'jurusan',
                    'alumniAngkatan'
                    ])
                    ->where("id", Auth::user()->id)
                    ->first();
            } else {
                $dataSet = null;
            }

            $statusPernikahan = StatusPernikahan::all();
            $alumniAngkatan = AlumniAngkatan::all();
            $jurusan = Jurusan::all();
            $posisSaatIni = PosisiSaatIni::all();

            return view('form-alumni', [
                'status_pernikahan' => $statusPernikahan,
                'alumni_angkatan' => $alumniAngkatan,
                'jurusan' => $jurusan,
                'posisi_saat_ini' => $posisSaatIni,
                'data' => $dataSet,
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                'nis' => $request->nis,
                'name' => $request->nama_lengkap,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'wali_kelas' => $request->wali_kelas,
                'id_jurusan' => $request->jurusan,
                'id_alumni_angkatan' => $request->alumni_angkatan,
                'nomor_telepon' => $request->nomor_telepon,
                'id_status_menikah' => $request->status_pernikahan,
                'tahun_menikah' => $request->tahun_menikah,
                'id_posisi_saat_ini' => $request->posisi_saat_ini,
                'nama_instansi' => $request->nama_instansi,
                'bidang_instansi' => $request->bidang_instansi,
                'posisi_pekerjaan' => $request->posisi_pekerjaan,
                'jurusan_kuliah' => $request->jurusan_kuliah,
                'email' => $request->email,
                'alamat_lengkap' => $request->alamat_lengkap,
            ];

            $alumni = User::where('id', Auth::user()->id)->update($data);

            DB::commit();
            return response()->json([
                'success' => 'Data berhasil disimpan',
                'data' => $alumni
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
