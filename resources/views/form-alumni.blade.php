@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Form Data Alumni</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
                Silakan isi data alumni
              </div>
            <div class="card-body mx-3">
                {{-- <form id="formSubmitAlumni">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Cth : Bill gates">
                        </div>
                        <div class="col">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">-- Piih Jenis Kelamin --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <select class="form-control" name="status_pernikahan" id="status_pernikahan">
                                <option value="">-- Piih Status Pernikahan--</option>
                                @foreach ($status_pernikahan as $item)
                                    <option value="{{ $item->id }}">{{ $item->status_pernikahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-4">
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
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="posisi_saat_ini">Posisi saat ini</label>
                            <select class="form-control" name="posisi_saat_ini" id="posisi_saat_ini">
                                <option value="">-- Piih Posisi Saat Ini --</option>
                                @foreach ($posisi_saat_ini as $item)
                                    <option value="{{ $item->id }}">{{ $item->posisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="nama_instansi">Nama Instansi (Tempat Kerja/Usaha/Universitas)</label>
                            <input type="text" class="form-control" name="nama_instansi" placeholder="Cth : PT xxx">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="bidang_instansi">Bidang Instansi/Industri</label> <span class="float-right">(Optional)</span>
                            <input type="text" class="form-control" name="bidang_instansi" placeholder="Cth : IT">
                        </div>
                        <div class="col">
                            <label for="posisi_pekerjaan">Posisi Pekerjaan</label> <span class="float-right">(Optional)</span>
                            <input type="text" class="form-control" name="posisi_pekerjaan" placeholder="Cth : Programmer">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <textarea name="alamat_lengkap" style="min-height: 100px" rows="5" type="text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="mt-5 text-right">
                        <button type="reset" class="btn btn-secondary mx-1">Reset</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitData"><i class="fas fa-fw fa-check"></i> Submit</button>
                    </div>
                </form> --}}

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
                            <option value="user">User</option>
                        </select>
                      </div>
                      <div class="col user-input">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" name="nis" maxlength="4" id="nis" placeholder="Cth : 1234">
                      </div>
                      <div class="col">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Cth : Bill gates">
                      </div>
                    </div>
                    <div class="form-row mt-4 user-input">
                      <div class="col">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">-- Piih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
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
                      <label for="wali_kelas">Wali Kelas</label>
                      <input type="text" class="form-control" name="wali_kelas" id="wali_kelas" placeholder="Cth : Bu Mega">
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
                      <label for="alumni_angkatan">Alumni Angkatan</label>
                      <select class="form-control" name="alumni_angkatan" id="alumni_angkatan">
                          <option value="">-- Piih Tahun --</option>
                          @foreach ($alumni_angkatan as $item)
                              <option value="{{ $item->id }}">{{ $item->tahun_angkatan }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-row mt-4 user-input">
                    <div class="col">
                      <label for="nomor_telepon">Nomor Telepon</label>
                      <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" maxlength="13" placeholder="Cth : 087654321234">
                    </div>
                    <div class="col">
                      <label for="status_pernikahan">Status Pernikahan</label>
                      <select class="form-control" name="status_pernikahan" id="status_pernikahan">
                          <option value="">-- Piih Status Pernikahan--</option>
                          @foreach ($status_pernikahan as $item)
                              <option value="{{ $item->id }}">{{ $item->status_pernikahan }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col">
                        <label for="tahun_menikah">Tahun Menikah</label> <small class="float-right text-danger">(Optional)</small>
                        <input type="text" class="form-control" name="tahun_menikah" id="tahun_menikah" placeholder="Cth : 2020">
                    </div>
                  </div>

                  <div class="form-row mt-4 user-input">
                    <div class="col">
                      <label for="posisi_saat_ini">Posisi saat ini</label>
                      <select class="form-control" name="posisi_saat_ini" id="posisi_saat_ini">
                          <option value="">-- Piih Posisi Saat Ini --</option>
                          @forea
                      </select>
                    </div>
                    <div class="col">
                        <label for="nama_instansi">Nama Instansi (Kerja/Universitas)</label>
                        <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" placeholder="Cth : PT xxx / Univ. ITS">
                    </div>
                    <div class="col">
                      <label for="bidang_instansi">Bidang Instansi/Industri</label> <small class="float-right text-danger">(Optional)</small>
                      <input type="text" class="form-control" name="bidang_instansi" id="bidang_instansi" placeholder="Cth : IT">
                    </div>
                  </div>

                  <div class="form-row mt-4">
                    <div class="col user-input">
                      <label for="posisi_pekerjaan">Posisi Pekerjaan</label> <small class="float-right text-danger">(Optional)</small>
                      <input type="text" class="form-control" name="posisi_pekerjaan" id="posisi_pekerjaan" placeholder="Cth : Programmer">
                    </div>
                    <div class="col user-input">
                      <label for="jurusan_kuliah">Jurusan Kuliah</label> <small class="float-right text-danger">(Optional)</small>
                      <input type="text" class="form-control" name="jurusan_kuliah" id="jurusan_kuliah" placeholder="Cth : Teknik Informatika">
                    </div>
                    <div class="col">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Cth : user@mail.com">
                    </div>
                  </div>

                  <div class="form-row mt-4 user-input">
                    <div class="col">
                      <label for="alamat_lengkap">Alamat Lengkap</label>
                      <textarea name="alamat_lengkap" id="alamat_lengkap" style="min-height: 100px" rows="5" type="text" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="form-row mt-4">
                    <div class="col">
                      <label for="username">Username</label>
                      <input type="username" class="form-control" name="username" id="username" placeholder="Cth : username123">
                    </div>
                    <div class="col">
                      <label for="password">Password</label>
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
        var routeSimpan = '<?php echo route('form-alumni.store') ?>';
    </script>

    <script src="{{ asset('js/form-alumni.js') }}"></script>
@endpush
