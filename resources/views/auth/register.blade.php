@extends('auth.layouts.main')

@section('content')
<div class="col-xl-8 col-lg-12 col-md-12">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat datang, di aplikasi tracer study!</h1>
                            <h1 class="h5 text-gray-700 mb-4">Daftar Akun</h1>
                        </div>
                        <form class="user" action="{{ route('register.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="nama_lengkap" class="form-control form-control-user" name="nama_lengkap" id="nama_lengkap"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email"
                                    placeholder="Alamat Email" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="password" name="password" id="password" class="form-control form-control-user"
                                        id="password" placeholder="Password" required minlength="8">
                                </div>
                                {{-- <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Ulangi Password">
                                </div> --}}
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Daftar
                            </button>
                        </form>
                        <hr>
                        {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div> --}}
                        <div class="text-center">
                            <a class="small" href="{{ url('/') }}">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
