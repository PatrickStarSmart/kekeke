<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tokoku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                {{-- <a class="nav-link {{ Route::currentRouteName() === 'home' ? 'active' : '' }}" href="#">Home</a> --}}
                <a class="nav-link {{ Route::currentRouteName() === 'products' ? 'active' : '' }}"
                    href="{{ route('products') }}">Products</a>
                <a class="nav-link {{ Route::currentRouteName() === 'users' ? 'active' : '' }}"
                    href="{{ route('users') }}">Carts</a>
                <a class="nav-link {{ Route::currentRouteName() === 'transactions' ? 'active' : '' }}"
                    href="{{ route('transactions') }}">History</a>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-danger" type="" href="#">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
