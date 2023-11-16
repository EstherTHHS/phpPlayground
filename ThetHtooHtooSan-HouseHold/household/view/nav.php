<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #002B5B;">
    <!-- Container wrapper -->
    <div class="container">
      <!-- Navbar brand -->
      <a class="navbar-brand me-2  text-white" href="/">

        <i class="fa-solid fa-chart-pie fa-lg" style="color: #fff;"></i>
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarButtonsExample">
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  fs-5  <?= urlIs('/') ? "text-success " : "text-white" ?> " href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link   fs-5 <?= urlIs('/listwallet') ? "text-success " : "text-white" ?>" href="/listwallet">Wallet</a>
          </li>

        </ul>
        <!-- Left links -->

        <div class="d-flex align-items-center">
          <?php if ($_SESSION["username"] ?? false) : ?>

            <div class="rounded-pill border border-3 border-success p-2 text-white fs-5 me-3"><?= $_SESSION["username"] ?></div>


            <button type="button" class="btn btn-link px-3 me-2 ">
              <a href="/logout"> LogOut</a>
            </button>


          <?php else : ?>

            <a href="/register"><button type="button" class="btn btn-primary me-3 ">
                Register</button></a>

            <button type="button" class="btn btn-link px-3 me-2 ">
              <a href="/login"> Login</a>
            </button>


          <?php endif; ?>
        </div>


      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->