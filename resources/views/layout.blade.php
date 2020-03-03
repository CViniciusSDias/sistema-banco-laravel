<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Banco Alura</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-teal.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>
<body>
<section>
    <aside>
        <div id="aside-top"></div>
        <img src="https://getmdl.io/templates/dashboard/images/user.jpg" alt="avatar">
        <nav>
            <a href="#" class="active">Extrato</a>
            <a href="#">Sobre</a>
        </nav>
    </aside>

    <main>
        @yield('body')
    </main>
</section>

<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
@yield('js')
</body>
</html>
