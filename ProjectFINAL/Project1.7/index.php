<?php

//prevent from staying logged in when you return to the index for testing
session_start();
session_unset();
session_destroy();

$title = 'index.php';

require_once('common/functions.php');
require_once('common/config.php');

include('common/header.php');


 ?>


<h1 class="mt-5">Spooky Tiles!</h1>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="register.php">Create Account</a></li>
    <li><a href="login.php">Login</a></li>
</ul>

<img src="spooky_pic.jpg" alt="spooky pic">
<h2>Created by Stephen, Schaum, and Rohan for CS4370</h2>
<?php
include('common/footer.php')
 ?>
