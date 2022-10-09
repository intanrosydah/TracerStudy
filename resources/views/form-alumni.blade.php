@extends('layouts.main')

@section('title')
<h2 class="h3 mb-4 text-gray-800">Form Data Alumni</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="Cth : Intan Aulia">
                        </div>
                        <div class="col">
                            <label for="tanggal_lahir">Taggal Lahir</label>
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
                            <label for="status_menikah">Status Menikah</label>
                            <select class="form-control" name="status_menikah" id="status_menikah">
                                <option value="">-- Piih Status --</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum-Nikah">Belum Menikah</option>
                                <option value="Pernah-Menikah">Pernah Menikah</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col">
                            <label for="alumni_angkatan">Alumni Angkatan</label>
                            <select class="form-control" name="alumni_angkatan" id="alumni_angkatan">
                                <option value="">-- Piih Tahun --</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="">-- Piih Jurusan --</option>
                                <option value="TKJ">TKJ</option>
                                <option value="RPL">RPL</option>
                                <option value="Multimedia">Multimedia</option>
                                <option value="Bisnis">Bisnis</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-check"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
