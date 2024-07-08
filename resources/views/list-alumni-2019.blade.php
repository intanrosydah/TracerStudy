@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-light">Data Alumni Tahun 2019</h2>
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Teknik Komputer Jaringan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tkj ?? 0 }} Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-code fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Multimedia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $multimedia ?? 0 }} Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-video fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Rekaya Perangkat Lunak</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $rpl ?? 0 }} Orang</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-laptop fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Manajemen Bisnis</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bisnis ?? 0 }} Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data Alumni Tahun 2019
            </div>
            <div class="card-body">
                <table class="table table-hover" id="tableListAlumni2019">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
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
                        <th scope="col" width="150">Nomor Telepon</th>
                        <th scope="col" width="150">Status Menikah</th>
                        <th scope="col" width="150">Tahun Menikah</th>
                        <th scope="col" width="150">Posisi Saat Ini</th>
                        <th scope="col" width="150">Nama Instansi</th>
                        <th scope="col" width="150">Bidang Instansi</th>
                        <th scope="col" width="150">Jurusan Kuliah</th>
                        <th scope="col" width="150">Posisi Pekerjaan</th>
                        <th scope="col" width="290">Alamat Lengkap</th>
                      </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        var routeDataAlumni2019 = '<?php echo route('dataAlumni2019') ?>';
    </script>

    <script src="{{ asset('js/list-alumni.js') }}"></script>
@endpush
