@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Data User</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data User
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahUser"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <table class="table table-hover" id="tableUser">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Aksi</th>
                        <th scope="col" width="100">NIS</th>
                        <th scope="col" width="190">Username</th>
                        <th scope="col" width="250">Nama Lengkap</th>
                        <th scope="col" width="150">Role</th>
                        <th scope="col" width="150">Jenis Kelamin</th>
                        <th scope="col" width="190">Tempat Lahir</th>
                        <th scope="col" width="150">Tanggal Lahir</th>
                        <th scope="col" width="250">Wali Kelas</th>
                        <th scope="col" width="150">Jurusan</th>
                        <th scope="col" width="150">Alumni Angkatan</th>
                        <th scope="col" width="290">Alamat Lengkap</th>
                      </tr>
                    </thead>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal-content')
  <!-- Modal -->
  <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formUser">
                {{ csrf_field() }}
                <input type="hidden" name="id_user" id="id_user">
                <div class="form-row">
                  <div class="col">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="">-- Piih Role --</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="guru">Guru</option>
                        <option value="user">Alumni</option>
                    </select>
                  </div>
                  <div class="col user-input">
                    <label for="nis">NIS</label>
                    <input type="text" class="form-control" name="nis" maxlength="4" id="nis" placeholder="Cth : 1234">
                  </div>
                </div>
                <div class="form-row mt-4">
                  <div class="col nama-lengkap">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Cth : Bill gates">
                  </div>
                  <div class="col user-input">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">-- Piih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="form-row mt-4 user-input">
                  <div class="col">
                      <label for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Cth : Sidoarjo">
                  </div>
                  <div class="col">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                  </div>
              </div>

              <div class="form-row mt-4 user-input">
                <div class="col">
                  <label for="alumni_angkatan">Alumni Angkatan</label>
                  <select class="form-control" name="alumni_angkatan" id="alumni_angkatan">
                      <option value="">-- Piih Tahun --</option>
                      @foreach ($alumni_angkatan as $item)
                          <option value="{{ $item->id }}">{{ $item->tahun_angkatan }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col">
                  <label for="jurusan">Jurusan</label>
                  <select class="form-control" name="jurusan" id="jurusan">
                      <option value="">-- Piih Jurusan --</option>
                      @foreach ($jurusan as $item)
                          <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col">
                  <label for="wali_kelas">Wali Kelas</label>
                  <input type="text" class="form-control" name="wali_kelas" id="wali_kelas" placeholder="Cth : Bu Mega">
                </div>
              </div>

              <div class="form-row mt-4 user-input">
                <div class="col">
                  <label for="alamat_lengkap">Alamat Lengkap</label>
                  <textarea name="alamat_lengkap" id="alamat_lengkap" style="min-height: 100px" rows="5" type="text" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-row mt-4 user-pass">
                <div class="col">
                  <label for="username">Username</label>
                  <input type="username" class="form-control" name="username" id="username" placeholder="Cth : username123">
                </div>
                <div class="col">
                  <label for="password">Password</label> <small class="text-danger float-right" id="pass"></small>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
              </div>

              <div class="mt-4 text-right">
                  <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary" id="btnSimpan"><i class="fas fa-fw fa-check"></i> Simpan</button>
              </div>
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection

@push('js')
    <script>
        var routeIndex = '<?php echo route('user.index') ?>';
        var routeSimpan = '<?php echo route('user.store') ?>';
    </script>

    <script src="{{ asset('js/user.js') }}"></script>
@endpush
