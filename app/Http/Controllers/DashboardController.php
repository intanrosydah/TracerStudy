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
                    'nomor_telepon' => $query->nomor_telepon ?? '-',
                    'status_pernikahan' => $query->statusPernikahan->status_pernikahan ?? '-',
                    'tahun_menikah' => $query->tahun_menikah ?? '-',
                    'posisi_saat_ini' => $query->posisiSaatIni->posisi ?? '-',
                    'nama_instansi' => $query->nama_instansi ?? '-',
                    'bidang_instansi' => $query->bidang_instansi ?? '-',
                    'jurusan_kuliah' => $query->jurusan_kuliah ?? '-',
                    'posisi_pekerjaan' => $query->posisi_pekerjaan ?? '-',
                    'alamat_lengkap' => $query->alamat_lengkap ?? '-',
                ];
            });

            if ($request->ajax()) {
                $allData = DataTables::of($mapingData)
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
