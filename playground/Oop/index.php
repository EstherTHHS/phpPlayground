<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    var_dump($class);
    require __DIR__. "/../{$class}.php";
});
use Oop\Employee;

$employee = new Employee('John', 'Smith', 30);
echo $employee->getFirstName();
echo $employee->getLastName();
echo $employee->getAge();