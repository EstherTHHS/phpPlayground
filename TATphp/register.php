<!DOCTYPE html>
<html lang="en">

<?php
$error = [];

if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirmPassword'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($username)) {
        $error['username'] = 'Username can\'t be empty!';
    }
    if (empty($email)) {
        $error['email'] = 'Email can\'t be empty!';
    }
    if (empty($password)) {
        $error['password'] = "Password can't be empty!";
    }
    if (empty($confirmPassword)) {
        $error['confirmPassword'] = "Confirm password can't be empty!";
    }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Invalid email!";
    }
    if (
        !empty($password) &&
        !empty($confirmPassword) && 
        $password !== $confirmPassword
    ) {
        $error['confirmPassword'] = "Password doesn't match";
    }

    if (
        !empty($username) && 
        !empty($email) && 
        filter_var($email, FILTER_VALIDATE_EMAIL) && 
        !empty($password) && 
        !empty($confirmPassword) && 
        $password === $confirmPassword
    ) {
        header('location: http://localhost/playground/login.php');
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js' integrity='sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==' crossorigin='anonymous'></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Note</a>
                    <a class="nav-link" href="#">Todo</a>
                </div>
                <div class="navbar-text ms-auto">
                    <a href="/playground/login.php" class="text-decoration-none">Login</a>
                    <span class="mx-2">|</span>
                    <a href="/playground/register.php" class=" text-decoration-none">Register</a>
                </div>
            </div>
        </div>
    </nav>
    <form class="py-3 w-25 mx-auto" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" autocomplete="off">
            <?php if (isset($error['username'])) : ?>
                <div id="emailHelp" class="form-text text-danger">
                    <?= $error['username'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control" id="email" autocomplete="off">
            <?php if (isset($error['email'])) : ?>
                <div id="emailHelp" class="form-text text-danger">
                    <?= $error['email'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" autocomplete="off">
            <?php if (isset($error['password'])) : ?>
                <div id="emailHelp" class="form-text text-danger">
                    <?= $error['password'] ?>
                </div>
            <?php endif ?>
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" autocomplete="off">
            <?php if (isset($error['confirmPassword'])) : ?>
                <div id="emailHelp" class="form-text text-danger">
                    <?= $error['confirmPassword'] ?>
                </div>
            <?php endif ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>