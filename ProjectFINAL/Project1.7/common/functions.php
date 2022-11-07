<?php

function authenticate_user($name, $password) {
    global $accounts;
    foreach($accounts as $account) {
        if( $name == $account["name"] && $password == $account["password"]){
            return true;
        }
    }
}

function redirect($url) {
    header("Location: $url");
}

function ensure_user_is_authenticated() {
    if (!is_user_authenticated()) {
        redirect('login.php');
    }
}

function test_account($name) {
  global $accounts;
  foreach($accounts as $account) {
      if( $name == $account["name"]){
          return false;
      }
  }
  return true;
}
function is_user_authenticated() {
    return isset($_SESSION['name']);
}

//loads account data from accounts.txt into $accounts($name, $password, $highscore)
function load_account_data() {
    $file = "common/accounts.txt";
    $lines = file($file, FILE_IGNORE_NEW_LINES);
    $accounts =[];

    for ($i = 0; $i < count($lines); $i++) {
            list($name, $password, $highscore) = explode(",", $lines[$i]);
            $accounts[$i] = array("name" => $name, "password" => $password, "highscore" =>$highscore);
    }
    return $accounts;
}

//function to find user and return username, password, high_score as keyed array
function sort_highscore($accounts) {
    foreach ($accounts as $key => $row) {
        $highscore[$key]  = $row['highscore'];
}
    array_multisort($highscore, SORT_ASC, $accounts);
    return $accounts;
}

function save_highscore($name, $value) {
    $accounts = load_account_data();

    for ($i=0; $i < count($accounts); $i++) {

        if ($name == $accounts[$i]["name"] ) {

            //store the lower of the two scores in the highscore index
            if ($accounts[$i]["highscore"] > $value) {
            $accounts[$i]["highscore"] = $value;

            }
        }
    }

    $file = fopen('common/accounts.txt', 'w');
    foreach ($accounts as $lines) {
        fwrite($file, implode(",", $lines) . "\n");
    }
}

 ?>
