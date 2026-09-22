<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Khoa Huynh Dev</a>
        </button>
        @auth
            <div>
                <span class="text-white">{{ auth()->user()->name }}, </span>
                <a href="{{ route('logout') }}" class="text-white">
                    Logout
                </a>
            </div>
        @endauth
    </div>
</nav>
