
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- header --}}
    @include('auth.includes.header')
</head>

<body style= "background: #000046;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #1CB5E0, #000046);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #1CB5E0, #000046); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
;">

    <div class="container">
        <div class="row justify-content-center">
            {{-- content --}}
            @yield('content')
        </div>
    </div>

    {{-- footer --}}
    @include('auth.includes.footer')

    {{-- js --}}
   @stack('js')
</body>

</html>
