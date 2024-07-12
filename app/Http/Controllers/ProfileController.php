<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = User::where('id', Auth::user()->id)->first();
            return view('profile', [
                'data' => $data
            ]);
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
            $file_path = 'public/user_image';
            if ($request->has('upload_image')) {
                $upload = $request->file('upload_image')->store($file_path);
            }

            if (isset($request->upload_image)) {
                $data = [
                    'image' => Storage::url($upload),
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
}
