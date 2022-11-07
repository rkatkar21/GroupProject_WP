<?php
//same as login.php
session_start();
$title = 'login.php';


require_once('common/config.php');
require_once('common/functions.php');

if (is_user_authenticated()) {
    redirect('start-screen.php');
    die();
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // compare with data store
    if (authenticate_user($name, $password)){
        $_SESSION['name'] = $name;
        redirect('start-screen.php');
        die();
    } else {
        $status = "The provided crendentials didn't work";
    }
    if ($name == false) {
        $status = "Please enter a valid name address";
    }
}

// if (isset($_POST['login'])) {
//     output($_POST);
// }







include('common/header.php');
 ?>

<link rel="stylesheet" href="styles.css">

 <div class="container">
     <div class="row">
         <div class="col-lg-12 text-center">
             <h1 class="mt-5">Login</h1>
             <ul>
                 <li><a href="index.php">Home</a></li>
                 <li><a href="register.php">Create Account</a></li>
                 <li><a href="login.php">Login</a></li>
             </ul>
         </div>
     </div>
     <div class="row">
         <form class="login" action="" method="POST">
             <fieldset>
                 <div class="form-group">
                     <label for="name">Name: </label>
                     <input class="form-control" type="text" name="name" id="name" />
                 </div>
                 <div class="form-group">
                     <label for="password">Password: </label>
                     <input class="form-control" type="password" name="password" id="password" />
                 </div>
                 <div class="form-group">
                     <input type="submit" name="login" value="Login" />
                 </div>
            </fieldset>
         </form>
     </div>
     <div class="row">
         <form class="" action="logout.php" method="get">
             <fieldset>
                 <input type="submit" name="submit" value="Logout">
             </fieldset>
         </form>
     </div>
     <div class="row">
         <?php
            if (isset($status)) {
                echo $status;
            }
          ?>

     </div>




 </div>












<?php
include('common/footer.php');
 ?>
