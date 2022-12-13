@extends('auth.layouts.main')

@section('content')

<div class="col-xl-6 col-lg-12 col-md-12">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat datang, di aplikasi tracer study!</h1>
                            <p class="h5 text-gray-700 mb-4">Masukkan Nomor Induk Siswa</p>
                        </div>
                        <form id="formCekNis" class="user" enctype="multipart/form-data">
                            {{ csrf_field() }}
                              <div class="form-group">
                                  <input type="text" name="nis" maxlength="4" class="form-control form-control-user"
                                      id="nis"
                                      placeholder="Nomor Induk Siswa" required>
                              </div>
                            <button type="button" id="cekNis" class="btn btn-primary btn-user btn-block">
                                Lanjut <i class="fas fa-fw fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <script>
      var routeCekNis = '<?php echo route('user-nis.store') ?>';
      var routeFormAlumni = '<?php echo route('form-alumni.index') ?>';
    </script>
    <script src="{{ asset('js/user-nis.js') }}"></script>
@endpush
