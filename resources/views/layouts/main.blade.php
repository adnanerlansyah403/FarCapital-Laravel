<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 -  HTML&CSS Design</title>

    <!-- custom link css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


</head>
<body>

    @include('layouts.header')

    <main>
        <article>

            @yield('content_main')

        </article>
    </main>

    @include('layouts.footer')

    @stack('scripts')

</body>
</html>