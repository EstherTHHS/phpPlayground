<?php

require 'function.php';


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// dd(parse_url($uri));
// echo $uri;
///mvc_blog/
//array(1) {
//   ["path"]=>
//   string(10) "/mvc_blog/"
// }

$routes = [
  '/' => 'controller/home.php',
  '/about' => 'controller/about.php',
  '/contact' => 'controller/contact.php'
];

// if ($uri === '/mvc_blog/home') {
//   require '';
// } else if ($uri === '/about') {
//   require 'controller/about.php';
// } else if ($uri === '/contact') {
//   require 'controller/contact.php';
// }


if (array_key_exists($uri, $routes)) {
  require $routes[$uri];
} else {
  http_response_code(404);
}
