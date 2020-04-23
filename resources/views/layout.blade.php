<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <header>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            {{-- <h5 class="my-0 mr-md-auto font-weight-normal">CESI Movie</h5> --}}
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">CESI Movie</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="/apropos">A propos</a>
            </nav>
            <a class="btn btn-outline-primary" href="/projet/create">Créer un projet</a>
        </div>
    </header>
</head>
<body>

    @yield('body')
</body>
</html>
