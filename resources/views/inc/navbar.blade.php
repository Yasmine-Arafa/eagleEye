<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                    <li class="nav-item active"><a class="nav-link" href="/"><img width="60" height="60" src="/storage/eagle-eye.png" alt="Eagle-Eye" > </a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="/about">About </a></li>
                    <li class="nav-item"><a class="nav-link" href="/services">Services </a></li>
                    <li class="nav-item"><a class="nav-link" href="/posts">Blog </a></li> --}}
            </ul>

            @if (session()->has('admin'))
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item ml-md-3">
                    <a class="btn btn-primary" href="{{ url('addguard') }}">Add new guard</a>
                  </li>

                  <li class="nav-item ml-md-3">
                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                  </li>
            </ul>

            @endif

        </div>
    </div>
</nav>

