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
                <table class="table table-hover" id="tableAlumni">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Status Menikah</th>
                        <th scope="col">Alumni Angkatan</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Posisi Saat Ini</th>
                        <th scope="col">Nama Instansi</th>
                        <th scope="col">Bidang Instansi</th>
                        <th scope="col">Posisi Pekerjaan</th>
                        <th scope="col">Alamat Lengkap</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        loadTableAlumni();
    });

    function loadTableAlumni() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#tableAlumni').DataTable({
            processing: true,
            serverSide: true,
            ajax : {
                url : "{{ route('alumni.index') }}"
            },
            columns : [
                {
                    // "data" : true,
                    // "sortable" : true,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1
                    }
                },
                {
                    data : 'nama_lengkap',
                    name : 'Nama Lengkap',
                },
                {
                    data : 'tanggal_lahir',
                    name : 'Tanggal Lahir',
                },
                {
                    data : 'jenis_kelamin',
                    name : 'Jenis Kelamin',
                },
                {
                    data : 'id_status_menikah',
                    name : 'Status Pernikahan',
                },
                {
                    data : 'id_alumni_angkatan',
                    name : 'Alumni Angkatan',
                },
                {
                    data : 'id_jurusan',
                    name : 'Jurusan',
                },
                {
                    data : 'id_posisi_saat_ini',
                    name : 'Posisi Saat Ini',
                },
                {
                    data : 'nama_instansi',
                    name : 'Nama Instansi',
                },
                {
                    data : 'bidang_instansi',
                    name : 'Bidang Instansi',
                },
                {
                    data : 'posisi_pekerjaan',
                    name : 'Posisi Pekerjaan',
                },
                {
                    data : 'alamat_lengkap',
                    name : 'Alamat Lengkap',
                },
            ],
            order: [[0, 'desc']]
        });
    }
</script>
@endpush
