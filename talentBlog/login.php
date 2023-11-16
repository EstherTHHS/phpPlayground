<?php
require 'dbConnection.php';

if (isset($_SESSION["username"])) {
  header('Location: /');
}

$errors = [];
$result = false;
if (isset($_POST["email"]) && isset($_POST["password"]) && $_POST["username"]) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $pwd = $_POST["password"];


  if (strlen($username) > 0 && strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($pwd) > 0) {

    $sql = $pdo->prepare("
    SELECT * FROM users WHERE 
    username=:username AND email=:email
    ");
    $sql->bindValue(":username", $username);
    $sql->bindValue(":email", $email);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($result)) {
      if (password_verify($pwd, $result[0]['pwd'])) {
        $_SESSION["userid"] = $result[0]['id'];
        $_SESSION["username"] = $username;
        $_SESSION["email"] = $email;
        header("Location: /");
      } else {
        $errors['body'] = "enter valid pwd";
      }
    } else {
      header("Location: /login");
    }
  } else {

    $errors['body'] = "Enter the valide the username , email and password";
  }
}


?>


<?php require 'views/header.view.php'; ?>
<?php require 'views/nav.view.php'; ?>

<body>






  <section class="vh-100" style="background-color: #DDF7E3;">
    <div class=" container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
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
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                <br>
                <br>
                <a href="./register">New? <u>Register</u></a>
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
</body>

</html>