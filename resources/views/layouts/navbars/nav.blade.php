<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 my-3 {{ (Request::is('static-sign-up') ? 'w-100 shadow-none  navbar-transparent mt-4' : 'blur blur-rounded shadow py-2 start-0 end-0 mx4') }}">
  <div class="container-fluid {{ (Request::is('static-sign-up') ? 'container' : 'container-fluid') }}">
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav ms-auto">
        @if (auth()->user())
        <li class="nav-item">
        <a class="nav-link me-2" href="{{ url('dashboard') }}">
        <i class="fa fa-globe opacity-6 me-1 {{ (Request::is('dashboard') ? '' : 'text-dark') }}"></i>
            Cek Domain
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link me-2" href="{{ url('order/' . Auth::user()->id) }}">
        <i class="fa fa-file opacity-6 me-1 {{ (Request::is('order') ? '' : 'text-dark') }}"></i>
            Order
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ url('logout') }}">
            <i class="fa fa-user opacity-6 me-1 {{ (Request::is('logout') ? '' : 'text-dark') }}"></i>
            Logout
          </a>
        </li>
        @endif
        @if (!auth()->user())
        <li class="nav-item">
        <a class="nav-link me-2" href="{{ url('/') }}">
        <i class="fa fa-globe opacity-6 me-1 {{ (Request::is('/') ? '' : 'text-dark') }}"></i>
            Cek Domain
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-up') : url('register') }}">
            <i class="fas fa-user-circle opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
            Daftar
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ auth()->user() ? url('static-sign-in') : url('login') }}">
            <i class="fas fa-key opacity-6 me-1 {{ (Request::is('static-sign-up') ? '' : 'text-dark') }}"></i>
            Log in
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
