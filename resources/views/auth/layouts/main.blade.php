
<!DOCTYPE html>
<html lang="en">

<head>
    {{-- header --}}
    @include('auth.includes.header')
</head>

<body class="bg-primary">

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
