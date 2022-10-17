@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-gray-800">Data Status Pernikahan</h2>
@endsection

@section('content')
<div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-header">
               List Data Status Pernikahan
            </div>
            <div class="card-body">
                <a href="javascript:void(0)" class="class btn btn-primary mb-4" id="tambahStatusPernikahan"><i class="fas fa-fw fa-plus"></i> Tambah</a>
                <table class="table table-hover" id="tableStatusPernikahan">
                    <thead>
                      <tr>
                        <th scope="col" width="10">No.</th>
                        <th scope="col" width="70">Aksi</th>
                        <th scope="col">Status Pernikahan</th>
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
  <div class="modal fade" id="modalStatusPernikahan" tabindex="-1" aria-labelledby="modalHeading" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalHeading"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3 my-2">
            <form id="formStatusPernikahan">
                {{ csrf_field() }}
                <input type="hidden" name="id_status_pernikahan" id="id_status_pernikahan">
                <div class="form-row">
                    <label for="status_pernikahan">Status Pernikahan</label>
                    <input type="text" class="form-control" name="status_pernikahan" id="status_pernikahan" placeholder="Cth : Menikah">
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
        var routeIndex = '<?php echo route('status-pernikahan.index') ?>';
        var routeSimpan = '<?php echo route('status-pernikahan.store') ?>';
    </script>

    <script src="{{ asset('js/status-pernikahan.js') }}"></script>
@endpush
