<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Latihan Laravel - Farcapital")</title>

    <style>
        ul {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-block: 10px;
            /* padding-inline: 60px; */
        }

        li { list-style: none; }
    </style>

</head>
<body>

    <nav>
        <ul>
            <li>
                <a href="{{ route("index") }}">Pengguna</a>
            </li>
            <li>
                <a href="{{ route("products.index") }}">Product</a>
            </li>
            <li>
                <a href="{{ route("blogs.index") }}">Blog</a>
            </li>
        </ul>
    </nav>

    <div class="container">

        @yield("content_master")

    </div>

    {{-- @stack("scripts") --}}

</body>
</html>