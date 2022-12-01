<header>
        <nav class="navbar navbar-expand-lg navbar-light nav-bg py-0 justify-content-center align-items-center">
            <div>
                <a class="navbar-brand py-3" href="{{ route('home') }}">
                    <img width="70" class="rounded" src="{{asset('img/logo1.png')}}" alt="Logo">
                    <img width="135" class="rounded" src="{{asset('img/logoScritta.png')}}" alt="Logo">
                </a>  
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                @guest
                            <li class="nav-item">
                                <span style="font-size: 18px;" class="nav-text nav-link font-weight-bold">Sei un medico?</span>
                            </li>
                            <li class="nav-item">
                                <a style="font-size: 18px;" class="nav-link font-weight-bold pr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="font-size: 18px;" class="nav-link font-weight-bold px-3" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a style="font-size: 18px;" class="nav-link font-weight-bold pr-3" href="{{ route('admin.home', Auth::user()->doctor) }}">Dashboard privata</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="font-size: 18px;" class="nav-link font-weight-bold px-3 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->doctor['name'] }} {{ Auth::user()->doctor['surname']}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.doctors.show', Auth::user()->doctor) }}">
                                        {{ __('Profilo privato') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
              </div>
            </div>
          </nav>
   
</header>
