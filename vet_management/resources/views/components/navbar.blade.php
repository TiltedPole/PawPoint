<nav class="navbar sticky-top navbar-expand-md navbar-dark" style="background-color: darkslategray;">
    <a class="navbar-brand" href="{{ route('admin-dashboard.view') }}">
        <img src="{{ URL('img/PawPoint-w.png') }}" style="width: 250px;" class="px-3">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        @if (Auth::user()->type == "super-admin")
            <a href="{{ route('admin-dashboard.view') }}">
                <button type="button" class="btn btn-dark">Admin Dashboard</button>
            </a>
            <a href="{{ route('dashboard.view') }}">
                <button type="button" class="btn btn-dark">Client Dashboard</button>
                </a>
        @elseif (Auth::user()->type == "admin")
            <button type="button" class="btn btn-dark">Admin</button>
        @elseif (Auth::user()->type == "client")
            <button type="button" class="btn btn-dark">Client</button>
        @endif
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li>
                <button type="button" class="btn btn-dark">PawPoint v1.0.0</button>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown">
                    <span class="mr-2 d-none d-lg-inline small" style="color: white">{{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}</span>
                    <img class="rounded-circle" style="width:30px; height:30px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profile.view') }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item btn btn-light w-100" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
