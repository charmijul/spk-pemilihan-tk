<style>
    .nav .nav-item .nav-link {
    color: green;
  }
    .nav .nav-item .nav-link.active {
    color: green;
    font-weight: bold;
  }
</style>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/datatk*') ? 'active' : '' }}" href="/dashboard/datatk">
                    <span data-feather="file-text"></span>
                    Data TK
                </a>
            </li>
        </ul>
    </div>
</nav>