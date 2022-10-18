@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Data Alumni Angkatan</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data Alumni Angkatan
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahAlumniAngkatan"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <table class="table table-hover" id="tableAlumniAngkatan">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Aksi</th>
                        <th scope="col">Tahun Angkatan</th>
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
  <div class="modal fade" id="modalAlumniAngkatan" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formAlumniAngkatan">
                {{ csrf_field() }}
                <input type="hidden" name="id_alumni_angkatan" id="id_alumni_angkatan">
                <div class="form-row">
                    <label for="alumni_angkatan">Tahun Angkatan</label>
                    <input type="text" class="form-control" name="alumni_angkatan" id="alumni_angkatan" placeholder="Cth : 2022">
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
        var routeIndex = '<?php echo route('alumni-angkatan.index') ?>';
        var routeSimpan = '<?php echo route('alumni-angkatan.store') ?>';
    </script>

    <script src="{{ asset('js/alumni-angkatan.js') }}"></script>
@endpush
