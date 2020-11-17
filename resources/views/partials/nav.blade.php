<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand user-select-none" href="{{ url('/') }}">
            <i class="fas fa-bolt"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <div class="d-flex">
                        @foreach($navigation['left_side_links'] ?? [] as $link)
                            <a class="nav-link user-select-none" href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <div class="d-flex">
                            @foreach($navigation ?? [] as $link)
                                <a class="nav-link" href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                            @endforeach
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle user-select-none" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!--Dropdown links generation -->
                            @foreach($navigation['dropdown_links'] ?? [] as $link)
                                @if($link['url'] === route('logout'))
                                    <a class="dropdown-item user-select-none" href="{{ $link['url'] }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ $link['name'] }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                @else
                                    <a class="dropdown-item user-select-none" href="{{ $link['url'] }}">{{ $link['name'] }}</a>
                                @endif
                            @endforeach

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
