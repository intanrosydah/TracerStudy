<?php

namespace App\Http\Controllers\Alumni;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\AlumniAngkatan;
use App\Models\Jurusan;
use App\Models\PosisiSaatIni;
use App\Models\StatusPernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = Alumni::with([
                'statusPernikahan',
                'alumniAngkatan',
                'jurusan',
                'posisiSaatIni'
            ])
            ->get();

            if ($request->ajax()) {
                $allData = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row) {
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'. $row->id .'"
                            data-original-title="Edit" class="btn btn-success btn-sm editAlumni"><i class="fas fa-fw fa-pen"></i></a>';
                        $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'. $row->id .'"
                            data-original-title="Hapus" class="btn btn-danger btn-sm hapusAlumni ml-1"><i class="fas fa-fw fa-trash-alt"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);

                return $allData;
            }

            $statusPernikahan = StatusPernikahan::all();
            $alumniAngkatan = AlumniAngkatan::all();
            $jurusan = Jurusan::all();
            $posisiSaatIni = PosisiSaatIni::all();

            return view('alumni', [
                'data' => $data,
                'status_pernikahan' => $statusPernikahan,
                'alumni_angkatan' => $alumniAngkatan,
                'jurusan' => $jurusan,
                'posisi_saat_ini' => $posisiSaatIni
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
                'alamat_lengkap' => $request->alamat_lengkap
            ];

            $alumni = Alumni::updateOrCreate([
                'id' => $request->id_alumni
            ], $data);

            DB::commit();
            return response()->json([
                'success' => 'Data berhasil disimpan',
                'data' => $alumni
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
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
        try {
            $alumni = Alumni::where('id', $id)->first();

            return response()->json($alumni);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
        try {
            DB::beginTransaction();

            $alumni = Alumni::where('id', $id)->delete();

            DB::commit();
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $alumni
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
