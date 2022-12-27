<nav class="navbar navbar-expand navbar-dark fixed-bottom card-1 shadow rounded-0">
    <div class="container-fluid">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-4">
                <a class="nav-link @if (Route::currentRouteName() == 'home')
                    active
                @endif" aria-current="page" href="{{ route('home') }}"><i class="fas fa-home fa-lg"></i></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="#"><i class="fas fa-info-circle fa-lg"></i></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link @if (Route::currentRouteName() == 'profile')
                    active
                @endif" href="{{ route('profile', Auth::id()) }}"><i class="fas fa-user fa-lg"></i></a>
            </li>
            <li class="nav-item mx-4">
                <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>