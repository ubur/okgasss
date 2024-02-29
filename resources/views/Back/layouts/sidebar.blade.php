<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('article') }}">
                    <span data-feather="file"></span>
                    Article
                </a>
            </li>

            @if (auth()->user()->role == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('categories') }}">
                        <span data-feather="shopping-cart"></span>
                        Categories
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ url('users') }}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <span data-feather="bar-chart-2"></span>
                    Logout
                </a>
            </li>



        </ul>


    </div>
</nav>
