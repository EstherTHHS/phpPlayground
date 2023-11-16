<?php

function dd($value)
{
  echo "<pre/>";
  var_dump($value);
  echo "<pre/>";
}

function urlIs($value)
{
  return $_SERVER["REQUEST_URI"] == $value;
}

function base_path($file)
{
  return BASE_PATH . $file;
}


// function login($user)
// {
//   $_SESSION['user'] = $user;
// }


function view($path)
{
  return base_path('view/' . $path);
  //require base_path('view/',$path);//require view('header.view.php)
}
