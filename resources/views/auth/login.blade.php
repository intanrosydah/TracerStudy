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
                        <form action="{{ route('authenticate') }}" method="post" class="user" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Masukan Alamat Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Lupa Password?</a>
                        </div> --}}
                        <div class="text-center">
                            <a class="small" href="{{ route('register') }}">Buat Akun!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
