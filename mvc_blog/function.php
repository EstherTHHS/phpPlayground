<?php
function dd($val)
{
  echo "<pre>";
  var_dump($val);
  die();
}
function urlIs($value)
{

  return  $_SERVER["REQUEST_URI"] === $value;
}
