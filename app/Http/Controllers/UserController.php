<?php

namespace App\Http\Controllers;

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
            $data = User::get();
            if ($request->ajax()) {
                $allData = DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('aksi', function($row) {
                        $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'. $row->id .'"
                            data-original-title="Edit" class="btn btn-success btn-sm editUser"><i class="fas fa-fw fa-pen"></i></a>';
                        $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'. $row->id .'"
                            data-original-title="Hapus" class="btn btn-danger btn-sm hapusUser ml-1"><i class="fas fa-fw fa-trash-alt"></i></a>';

                        return $button;
                    })
                    ->rawColumns(['aksi'])
                    ->make(true);

                return $allData;
            }

            return view('user', [
                'data' => $data,
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
                'email' => $request->email,
                'role' => $request->role,
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
                // create password baru jika user tidak ada
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
