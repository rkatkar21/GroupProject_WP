<?php

$title = 'create-account.php';

require_once('common/functions.php');
require_once('common/config.php');

include('common/header.php');

//validate input for name and password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameErr = "";
    $name = $_POST["name"];
    $password = $_POST["password"];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars_name = preg_match('@[^\w]@', $name);
    $specialChars_pw = preg_match('@[^\w]@', $password);

    if ($specialChars_name) {
      echo "Names cannot contain special characters. Please try again.";
    }
    elseif (!test_account($name)) {
      echo "Username taken, please use a different name.";
    }

    // elseif (!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
    elseif ($specialChars_pw || strlen($password) < 5) {
    echo 'Password should be at least 5 characters in length and cannot contain special characters.';
    } else {

     ?>

    <p><strong>Thank you!</strong></p>

    <p><a href="login.php">Now log in to start playing!</a></p>

    <?php
    $file = "common/accounts.txt";
    file_put_contents($file, $_POST["name"] . "," . $_POST["password"] . ",1000\n", FILE_APPEND);

    }
}
include('common/footer.php');

 ?>
