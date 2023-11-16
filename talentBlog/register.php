<?php
require 'dbConnection.php';
$errors = [];

$pwd = "";
$confirmPwd = "";
$err = "";
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pwd"]) && isset($_POST["confirmPwd"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $confirmPwd = $_POST["confirmPwd"];

  if (strlen($username) > 0 && strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($pwd) > 0 && strlen($confirmPwd)) {

    $sql = $pdo->prepare("
    SELECT * FROM users WHERE 
    email=:email
    ");
    $sql->bindValue(":email",  $email);
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) == 0) {
      $sql = $pdo->prepare("
        INSERT INTO users 
        (
          username,
          email,
          pwd,
          conpwd
        ) 
        Values
        (
          :username,
          :email,
          :pwd,
          :conpwd
        )
      
    ");

      $sql->bindValue(":username", $username);
      $sql->bindValue(":email",  $email);

      $sql->bindValue(":pwd", password_hash($pwd, PASSWORD_DEFAULT));
      $sql->bindValue(":conpwd", password_hash($confirmPwd, PASSWORD_DEFAULT));

      $sql->execute();
      header("Location: /");
    } else {
      echo "<script>
      alert('Already has username');
      </script>
      ";
    }
  } else {
    $errors['body'] = "Enter the valide the username , email and password!";
  }
}
?>



<?php require base_path('views/header.view.php') ?>
<?php require base_path('views/nav.view.php') ?>

<body>

  <section class="vh-100" style="background-color: #DDF7E3;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100 ">
        <div class="col-lg-12 col-xl-11 mt-3">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                  <form class="mx-1 mx-md-4" action="/register" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input style="border:1px solid #617143" type="text" id="form3Example1c" name="username" class="form-control" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <input style="border:1px solid #617143" type="text" id="form3Example3c" name="email" class="form-control" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input style="border:1px solid #617143" style="border:2px solid #617143" type="password" id="form3Example4c" name="pwd" class="form-control" />

                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                        <input style="border:1px solid #617143" type="password" id="form3Example4cd" name="confirmPwd" class="form-control" />


                        <?php if ($pwd !== $confirmPwd) :   ?>
                          <span class="text-danger"> Password is not match! </span>
                        <?php endif; ?>


                      </div>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button class="btn btn-primary btn-lg" type="submit">Register</button>
                    </div>

                  </form>
                  <p class="text-center text-muted">Have alerady an account? <a href="./login">
                      <u>Login here!</u> </a></p>
                  <?php if (!empty($errors)) : ?>
                    <div class="text-danger"><?= $errors['body'] ?></div>
                  <?php endif; ?>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2" style="width:400px">

                  <img src="https://images.unsplash.com/photo-1679882493712-0bf31e0cc5f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=872&q=80" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>