<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <title>Document</title>
</head>
<header>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/threads">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Browse
                    </a>
                    <div class="navbar-dropdown">
                        @if(auth()->check())
                        <a class="navbar-item" href="/threads?by={{auth()->user()->name}}">My Threads</a>
                            @endif
                            <a class="navbar-item" href="/threads?popular=1">Popular All Time</a>
                    </div>
                </div>

                <a class="navbar-item" href="/threads/create">
                    Create New Threads
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        @foreach(\App\Channel::all() as $channel)
                        <a class="navbar-item" href="/threads/{{$channel->slug}}">
                            {{$channel->name}}
                        </a>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    @if(!auth()->check())
                    <div class="buttons">
                        <a class="button is-primary" href="/register">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light" href="/login">
                            Log in
                        </a>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<body>
@yield('content')
</body>
</html>