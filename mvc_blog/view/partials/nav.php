<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item me-3">
          <a class="nav-link active <?= urlIs('/mvc_blog/home') ? 'text-success' : 'text-secondary' ?>" aria-current="page" href="index">Home</a>
        </li>


        <li class="nav-item me-3">
          <a class="nav-link <?= urlIs('/mvc_blog/about') ? 'text-success' : 'text-secondary' ?>" href="about">About</a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link <?= $_SERVER["REQUEST_URI"] === '/mvc_blog/contact' ? 'text-success' : 'text-secondary' ?>" href="contact">Contact

          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>