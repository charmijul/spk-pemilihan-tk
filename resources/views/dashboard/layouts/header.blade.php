<style>
    .text-berjalan{
  font-weight: bold;
  color: green;
 }

navbar {
  background-image:linear-gradient(to bottom right, #0AA804, #F3FF1E);
}

.navbar{
  background-image:linear-gradient(to bottom right, #0AA804, #F3FF1E);
}

.navbar-brand {
  padding-top: .75rem;
  padding-bottom: .75rem;
  margin-left: 50px;
  font-size: 20px;
  color: green;
  justify-items: center;
  font-weight: bold;
}
button{
  background-color: transparent;
  font-weight: bold;
  /* -webkit-text-stroke: 1px green; */
}
.bi{
  color: green;
}
</style>
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/home">SPK Pemilihan TK</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <marquee class="text-berjalan"> Selamat Datang di Halaman Dashboard Admin</marquee>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 bg-none border-0">
                    <i class="bi bi-box-arrow-in-down-left">Logout <span data-feather="log-out"></span></i>
                </button>
            </form>
        </div>
    </div>
</header>