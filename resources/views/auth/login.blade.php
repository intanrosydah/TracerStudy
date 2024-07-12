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
                            <p class="h5 text-gray-700 mb-4">Login</p>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block text">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block text">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{ route('authenticate') }}" method="post" class="user" enctype="multipart/form-data">
                            {{ csrf_field() }}
                             <div class="form-group">
                                <select class="form-control" style="border-radius: 10rem; height: 46px; font-size: 0.9rem;" name="role" id="role">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="superadmin_or_guru">Superadmin Atau Guru</option>
                                    <option value="user">Alumni</option>
                                </select>
                            </div> 
                            <div id="nisLogin">
                                <div class="form-group">
                                    <input type="text" name="nis" class="form-control form-control-user"
                                        id="nis"
                                        placeholder="Masukan Nomor Induk Siswa (NIS)" maxlength="4" required>
                                </div>
                            </div> 

                            <div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user"
                                        id="username"
                                        placeholder="Masukan Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr> 
                         <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div> 
                         <div class="text-center">
                            <a class="small" href="{{ route('register.index') }}">Buat Akun!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <script src="{{ asset('js/login.js') }}"></script>
@endpush
