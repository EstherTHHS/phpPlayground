<?php
/**
 * This file is not required to run this project.
 */
$set = true;

if (isset($_GET['email'])) {
    var_dump($_GET['email']);
} else {
    //
}

var_dump($_POST['email']);

$birthday = 18;

if ($birthday >= 18) {
    echo "Not allowed to enter!";
} else {
    echo "Allowed to enter!";
}
echo "<br/>";
$day = 1;

switch ($day) {
    case 1:
        echo "Monday";
        break;
    case 2:
        echo "Tuesday";
        break;
    case 3:
        echo "Wednesday";
        break;
    default:
        echo "No date";
}
echo "<br/>";
if ($day == 1) {
    echo "Monday from if";
} elseif ($day == 2) {
} else {
    echo "no date.";
}
echo "<br/>";

$fruits = ["apple", "orange", "grapes"];

$persons = [
    [
        "name" => "Mg Mg",
        "age" => "25"
    ],
    [
        "name" => "Aung Aung",
        "age" => "30"
    ]
];
pd($fruits);
echo "<pre>";
var_dump($persons);
echo "</pre>";
$hello = "Hello World!";

require('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<h1>" . $hello . "</h1>";
?>
    <h1><?= $hello; ?></h1>
    <h2>For loop</h2>
    <ul>
        <?php
    for ($i = 0; $i < count($fruits); $i++) {
        echo "<li>" . $fruits[$i] . "</li>";
    }
?>
        <h2>While loop</h2>
        <?php
$i = 0;
while ($i < count($fruits)) {
    echo "<li>" . $fruits[$i] . "</li>";
    $i++;
}
?>
    </ul>
    <div>
        <?php
foreach ($fruits as $fruit) {
    echo $fruit;
}
?>
    </div>

    <div>
        <?php
foreach ($persons as $person) {
    echo $person['name'];
    echo $person['age'];
}
?>
        <?php foreach ($persons as $person) : ?>
            <h3><?= $person['name'] ?></h3>
            <p><?= $person['age'] ?></p>
        <?php endforeach; ?>

        <?php if ($day === 1) : ?>
            <h2>Monday</h2>
        <?php endif; ?>
    </div>
</body>

</html>