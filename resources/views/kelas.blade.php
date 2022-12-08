@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Data Kelas</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data Kelas
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahKelas"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <table class="table table-hover" id="tableKelas">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Aksi</th>
                        <th scope="col">Kelas</th>
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
  <div class="modal fade" id="modalKelas" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formKelas">
                {{ csrf_field() }}
                <input type="hidden" name="id_kelas" id="id_kelas">
                <div class="form-row">
                    <label for="Kelas">Kelas</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Cth : 9 A">
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
        var routeIndex = '<?php echo route('kelas.index') ?>';
        var routeSimpan = '<?php echo route('kelas.store') ?>';
    </script>

    <script src="{{ asset('js/kelas.js') }}"></script>
@endpush
