<?php
require('database.php');

if (isset($_SESSION['user'])) {
  header('location: /');
  exit();
}

$errors = [];
if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ((strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL))
    && strlen($password) > 0
  ) {
    $query = sprintf(
      "SELECT * FROM users WHERE email = '%s'",
      mysqli_real_escape_string($conn, $email)
    );

    //dd($query);
    $result = mysqli_query($conn, $query);

    if (!$result) {
      $errors['body'] = "Errors when select the data.";
    } else {
      $row = mysqli_fetch_assoc($result);
      if (!empty($row)) {
        if ($row['password'] === $password) {
          // todo::to handel later
          login([
            'id' => $row['id'],
            'email' => $email
          ]);
          header('location: /');
          exit();
        } else {
          $errors['body'] = "Enter valid email and password.";
        }
      } else {
        $errors['body'] = "Enter valid email and password.";
      }
    }
  } else {
    $errors['body'] = "Enter valid email and password.";
  }
}
?>



//view


<section class="vh-100" style="background-color: #DDF7E3;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
              <h3 class="mb-5">Sign in</h3>
              <div class="form-outline mb-4">
                <input style="border:1px solid #617143" type="text" id="typeEmailX-2" name="username" class="form-control form-control-lg" placeholder="UserName" />
              </div>
              <div class="form-outline mb-4">
                <input style="border:1px solid #617143" type="text" id="typeEmailX-2" name="email" class="form-control form-control-lg" placeholder="userEmail" />
              </div>

              <div class="form-outline mb-4">
                <input style="border:1px solid #617143" type="password" id="typeEmailX-2" name="password" class="form-control form-control-lg" placeholder="Password" />
              </div>
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

              <br>
              <br>
              <a href="./register.php">New? <u>Register</u></a>
            </form>




            <?php if (!empty($errors)) : ?>

              <span class="text-danger"><?= $errors['body'] ?></span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>