<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reakcijos testas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                @foreach($navigation['welcome_links'] ?? [] as $link)
                    @if($link['url'] === route('logout'))
                        <a href="{{ $link['url'] }}"
                           onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ $link['name'] }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                    @endif
                @endforeach
            @else
                @foreach($navigation ?? [] as $link)
                    <a href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                @endforeach
            @endauth
        </div>
    @endif

    <div class="content">
        <h1>Sveiki atvyke į reakcijos testą !</h1>
        <div class="welcome-table-container">
            <h2>{{ $content['h2'] }}</h2>
            @table($content['table'])
        </div>
        <h3>{{ $content['h3'] }}</h3>
    </div>
</div>
</body>
</html>
