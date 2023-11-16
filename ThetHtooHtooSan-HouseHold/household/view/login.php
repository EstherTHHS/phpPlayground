<?php
require view('header.php');
require view('nav.php');
?>
<section class="vh-100" style="background-color: #DDF7E3;">
  <div class=" container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="/loginController" method="POST">
              <h3 class="mb-5">Sign in</h3>
              <div class="form-outline mb-4">
                <input style="border:2px solid #617143" type="text" id="typeEmailX-2" name="username" class="form-control form-control-lg" placeholder="Username" />
              </div>
              <div class="form-outline mb-4">
                <input style="border:2px solid #617143" type="text" id="typeEmailX-2" name="email" class="form-control form-control-lg" placeholder="userEmail" />
              </div>


              <div class="form-outline mb-4">
                <input style="border:2px solid #617143" type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" placeholder="Password" />
              </div>
              <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>

            </form>

            <br>
            <?php if (isset($_SESSION["errMsg1"])) : ?>
              <?php if ($_SESSION["errMsg1"] === "Password isn't valid") : ?>
                <h4 class="text-danger"><?= $_SESSION["errMsg1"] ?> </h4>
              <?php endif; ?>
              <?php $_SESSION["errMsg1"] = null; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION["errMsg2"])) : ?>
              <?php if ($_SESSION["errMsg2"] === "Invalid Email and Password") : ?>
                <h4 class="text-danger"><?= $_SESSION["errMsg2"] ?> </h4>
              <?php endif; ?>
              <?php $_SESSION["errMsg2"] = null; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION["errMsg3"])) : ?>
              <?php if ($_SESSION["errMsg3"] === "Require Username ,Email and Password") : ?>
                <h4 class="text-danger"><?= $_SESSION["errMsg3"] ?> </h4>
              <?php endif; ?>
              <?php $_SESSION["errMsg3"] = null; ?>
            <?php endif; ?>
            <br>
            <a href="/register">New? <u>Register</u></a>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php require view('footer.php'); ?>