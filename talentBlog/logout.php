<?php

var_dump($_SESSION);
$_SESSION["username"] = null;
session_destroy();

$params = session_get_cookie_params();
setcookie(session_name(), "", time() - 3600);
header("Location: /login");
