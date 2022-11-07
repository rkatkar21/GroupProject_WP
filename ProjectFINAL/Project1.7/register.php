<?php

$title = 'Home Page';

require_once('common/functions.php');


include('common/header.php');
 ?>
<link rel="stylesheet" href="styles.css">

<div class="container">
    <div class="column">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Create Account</h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="register.php">Create Account</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <form class="create-account" action="create-account.php" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input class="form-control" type="text" name="name" value="" size="10">
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input class="form-control" type="text" name="password" value="">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<p>Already have an account? <a href="login.php">Login here:</a></p>
<?php



include('common/footer.php')
 ?>
