<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">Home</a>
                <a class="nav-link" aria-current="page" href="{{ route('wadai') }}">Wadai</a>
                @can('admin')
                <a class="nav-link" href="{{ route('dashboard.showDataPengguna') }}">Data Pengguna</a>
                @endcan
            </div>
        </div>
        <div class="text-end d-flex align-items-center">
            <div class="user me-3">
                Halo, {{ Auth::user()->name }}
            </div>
            <div class="logout">
                <a href="{{ route('login.logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</nav>