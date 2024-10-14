<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user fa-2x"></i>
                {{-- <span class="badge badge-danger navbar-badge">3</span> --}}
                {{-- <img src="{{ asset('/assets/user/user.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('logout') }}">
                    {{ Auth::user()->name }} <i class="fas fa-user" ></i>
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

        <!--  Mido shriks function swetch lang one -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-language fa-2x"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>
        </li>

        <!--  Mido shriks function swetch lang tow -->
        {{-- <div class="btn-group">
            <a type="button" class="btn btn-default dropdown-toggle  waves-effect" data-toggle="dropdown"
                aria-expanded="false">
                <span class="avatar avatar-sm mt-3">
                    @if (app()->getLocale() == 'en')
                        <img src="{{ asset('./assets/flags/us.svg') }}" alt="..."
                            class="avatar-img rounded-circle">
                    @elseif (app()->getLocale() == 'ar')
                        <img src="{{ asset('./assets/flags/eg.svg') }}" alt="..."
                            class="avatar-img rounded-circle">
                    @endif
                </span>
            </a>

            <ul class="dropdown-menu">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div> --}}

    </ul>

</nav>
