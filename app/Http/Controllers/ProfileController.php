<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        try {
            return view('profile');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            DB::beginTransaction();

            if (isset($request->password)) {
                $data = [
                    'password' => Hash::make($request->password),
                ];

                User::where('id', Auth::user()->id)->update($data);
            }

            DB::commit();
            return response()->json([
                'success' => 'Data berhasil disimpan!',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }

    public function uploadImage(Request $request)
    {
        try {
            DB::beginTransaction();
            dd($request->all());

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            return $th->getMessage();
        }
    }
}
