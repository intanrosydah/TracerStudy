@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Data Alumni</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data Alumni
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahAlumni"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <table class="table table-hover" id="tableAlumni">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Aksi</th>
                        <th scope="col" width="190">Nama Lengkap</th>
                        <th scope="col" width="150">Tanggal Lahir</th>
                        <th scope="col" width="150">Jenis Kelamin</th>
                        <th scope="col" width="150">Status Menikah</th>
                        <th scope="col" width="150">Alumni Angkatan</th>
                        <th scope="col" width="150">Jurusan</th>
                        <th scope="col" width="150">Posisi Saat Ini</th>
                        <th scope="col" width="150">Nama Instansi</th>
                        <th scope="col" width="150">Bidang Instansi</th>
                        <th scope="col" width="150">Posisi Pekerjaan</th>
                        <th scope="col" width="270">Alamat Lengkap</th>
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
  <div class="modal fade" id="modalAlumni" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formAlumni">
                {{ csrf_field() }}
                <input type="hidden" name="id_alumni" id="id_alumni">
                <div class="form-row">
                    <div class="col">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Cth : Bill gates">
                    </div>
                    <div class="col">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
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
                        <input type="text" class="form-control" name="nama_instansi" id="nama_instansi" placeholder="Cth : PT xxx">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <label for="bidang_instansi">Bidang Instansi/Industri</label> <span class="float-right">(Optoinal)</span>
                        <input type="text" class="form-control" name="bidang_instansi" id="bidang_instansi" placeholder="Cth : IT">
                    </div>
                    <div class="col">
                        <label for="posisi_pekerjaan">Posisi Pekerjaan</label> <span class="float-right">(Optional)</span>
                        <input type="text" class="form-control" name="posisi_pekerjaan" id="posisi_pekerjaan" placeholder="Cth : Programmer">
                    </div>
                </div>
                <div class="form-row mt-4">
                    <div class="col">
                        <label for="alamat_lengkap">Alamat Lengkap</label>
                        <textarea name="alamat_lengkap" id="alamat_lengkap" style="min-height: 100px" rows="5" type="text" class="form-control"></textarea>
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
        var routeIndex = '<?php echo route('alumni.index') ?>';
        var routeSimpan = '<?php echo route('alumni.store') ?>';
    </script>

    <script src="{{ asset('js/alumni.js') }}"></script>
@endpush
