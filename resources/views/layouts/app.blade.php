<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('customCSS/mirror_style.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="/"><span class="navbar-brand mb-0 h1">Todo</span></a>
            <a href="/projects/create"><span class="btn btn-outline-todo btn-md">Create a Project</span></a>
        </div>
    </nav>

    <div class="container">

        @if (session()->has('success'))
            <div class="alert alert-success">

                {{ session()->get('success') }}

            </div>
        @endif

        @yield('content')

    </div>
    @yield('scripts')

</body>

</html>
