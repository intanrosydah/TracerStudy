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
                <form id="formSubmitAlumni">
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
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
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
                            <label for="bidang_instansi">Bidang Instansi/Industri</label> <span class="float-right">(Optoinal)</span>
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
