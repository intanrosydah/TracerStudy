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
                        <th scope="col" width="190">Nama</th>
                        <th scope="col" width="190">Email</th>
                        <th scope="col" width="190">Role</th>
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
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Cth : Bill gates">
                </div>
                <div class="form-row mt-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Cth : user@mail.com">
                </div>
                <div class="form-row mt-4">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option value="">-- Piih Role --</option>
                        <option value="superadmin">Superadmin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="form-row mt-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
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
