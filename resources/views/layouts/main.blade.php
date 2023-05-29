<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{-- favicon --}}
    <link rel="shortcut icon" href="/img/mwevents_logo_3.png" type="image/x-icon">

    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Lato" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js" defer></script>
</head>

<body>

    <header>
        <div class="box-img-header">
            <a href="/">
                <img class="img-logo" src="/img/mwevents_logo_2.png" alt="MW Events">
            </a>
        </div>

        <nav>
            <a href="/" class="nav-links">Eventos</a>
            <a href="/events/create" class="nav-links">Criar Eventos</a>
                @auth
                    <a href="/dashboard" class="nav-links">Meus Eventos</a>
                        <form action="/logout" method="POST">
                            @csrf
                                <a href="/logout" class="nav-links" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Sair
                                </a>
                        </form>
                @endauth
            <div class="box-btn-actions">
                @guest
                    <a href="/login" class="btn-action">Entrar</a>
                    <a href="/register" class="btn-action">Cadastrar</a>
                @endguest
            </div>
        </nav>

    </header>

    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg">
                        {{ session('msg') }}
                    </p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <p class="ass" id="ass">&copy; MW Events</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>