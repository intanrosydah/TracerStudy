<?php

namespace App\Http\Controllers;

use App\Models\AlumniAngkatan;
use App\Models\Jurusan;
use App\Models\PosisiSaatIni;
use App\Models\StatusPernikahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = User::with([
                'alumniAngkatan',
                'jurusan',
                ])
                ->orderBy('id', "desc")
                ->get();

            $mapingData = $data->map(function ($query) {
                return [
                    'id' => $query->id ?? '-',
                    'nis' => $query->nis ?? '-',
                    'username' => $query->username ?? '-',
                    'name' => $query->name ?? '-',
                    'role' => $query->role == 'user' ? 'Alumni' : '-',
                    'jenis_kelamin' => $query->jenis_kelamin ?? '-',
                    'tempat_lahir' => $query->tempat_lahir ?? '-',
                    'tanggal_lahir' => $query->tanggal_lahir ?? '-',
                    'wali_kelas' => $query->wali_kelas ?? '-',
                    'jurusan' => $query->jurusan->jurusan ?? '-',
                    'alumni_angkatan' => $query->alumniAngkatan->tahun_angkatan ?? '-',
                    'alamat_lengkap' => $query->alamat_lengkap ?? '-',
                ];
            });

            if ($request->ajax()) {
                $allData = DataTables::of($mapingData)
                    ->addIndexColumn()
                    ->make(true);

                return $allData;
            }

            $statusPernikahan = StatusPernikahan::all();
            $alumniAngkatan = AlumniAngkatan::all();
            $jurusan = Jurusan::all();
            $posisiSaatIni = PosisiSaatIni::all();

            return view('user', [
                'data' => $data,
                'status_pernikahan' => $statusPernikahan,
                'alumni_angkatan' => $alumniAngkatan,
                'jurusan' => $jurusan,
                'posisi_saat_ini' => $posisiSaatIni,
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
                'name' => $request->nama_lengkap,
                'role' => $request->role,
                'nis' => $request->nis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_jurusan' => $request->jurusan,
                'wali_kelas' => $request->wali_kelas,
                'alamat_lengkap' => $request->alamat_lengkap,
                'username' => $request->username,
                'id_alumni_angkatan' => $request->alumni_angkatan,
            ];

            // cek jika user ada
            $userExists = User::where('id', $request->id_user)->first();

            // jika user ada (true)
            if ($userExists) {
                // cek jika mengisikan password
                if (isset($request->password)) {
                    // password baru sesuai request
                    $data['password'] = Hash::make($request->password);
                } else {
                    // password lama sesuai database
                    $data['password'] = $userExists->password;
                }
            } else {
                // create password baru jika cek user tidak ada
                $data['password'] = Hash::make($request->password);
            }

            $user = User::updateOrCreate([
                'id' => $request->id_user
            ], $data);

            DB::commit();
            return response()->json([
                'success' => 'Data berhasil disimpan',
                'data' => $user
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
            $user = User::where('id', $id)->first();

            return response()->json($user);
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

            $user = User::where('id', $id)->delete();

            DB::commit();
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
