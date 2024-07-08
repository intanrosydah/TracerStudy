@extends('layouts.main')

@section('title')
<h2 class="h4 mb-4 text-light">Profile</h2>
@endsection

@section('content')
{{-- <div class="row">
    <div class="col">
        <div class="card o-hidden border-0 shadow-lg">
             <div class="card-body">

            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row">
    <div class="col-lg-4">
        <form id="formUploadImage" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;"> --}}
                    <img class="img-profile rounded-circle"
                            src="img/undraw_profile.svg" style="width: 150px;">
                    <h5 class="my-3">{{ Auth::user()->name }}</h5>
                    <div class="d-flex justify-content-center mb-2">
                    <button type="button" id="ubahFoto" class="btn btn-outline-primary">Ubah Foto</button>
                    <input type="file" class="custom-file-input" name="upload_image" id="upload_image" style="display: none" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Nama Lengkap</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-3">
                <p class="mb-0">Role</p>
            </div>
            <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
            </div>
            </div>
            <hr>
            <div class="row">
            <div class="col-sm-9">
                <button type="button" id="ubahPassword" class="btn btn-primary">Ubah Password</button>
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12" id="passwordBaru">
                <form id="formUpdatePassword" class="mt-3">
                    {{ csrf_field() }}
                    <div class="form-row align-items-center">
                      <div class="col">
                        <input type="password" class="form-control mb-2" id="password" name="password" placeholder="Masukan Password Baru" required minlength="8">
                      </div>
                      <div class="col-auto">
                        <button type="submit" id="updatePassword" class="btn btn-primary mb-2">Update</button>
                      </div>
                    </div>
                  </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

@push('js')
<script>
    var routeSimpan = '<?php echo route('update-password') ?>';
    var routeUploadImage = '<?php echo route('upload-image') ?>';
</script>

<script src="{{ asset('js/profile.js') }}"></script>
@endpush
