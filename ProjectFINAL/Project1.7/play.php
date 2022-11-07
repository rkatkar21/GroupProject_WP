<?php

session_start();

require_once('common/game_functions.php');
require_once('common/game_config.php');
require_once('common/config.php');


ensure_user_is_authenticated();


if($_SESSION['game_status'] == "off"){
  $_SESSION['game_status'] = "running";
  start_game($_SESSION['level']);
  $_SESSION['count'] = count($_SESSION['cards']);
}

$cards = $_SESSION['cards'];
$status = $_SESSION['game_status'];
play_game($cards, $status);

include('common/header.php');


$length = $_SESSION['count'];
?>

<!--DEBUG -->
<!-- <pre>
<?php //print_r($_SESSION['cards']); ?>
</pre> -->



<h1>Spooky Tiles!</h1>

<div class="game">

  <h3>User: <?php echo $_SESSION['name']; ?> </h3>

  <h3>Level: <?php echo $_SESSION['level']; ?> </h3>

  <h3>Number of Misses: <?php echo $_SESSION['misses']; ?> </h3>

  <h3>Number of matches left: <?php echo ($length/2 - $_SESSION['match_num']); ?></h3>



  <!-- <h3>Number of flipped cards: <?php echo $_SESSION['num_flipped']; ?></h3> -->
  <?php


  if ( $length <= 10 ) { ?>

    <table>
      <thead>
        <!-- heading of the table -->
      </thead>

      <tbody>
        <?php for($i=0; $i < count($_SESSION['cards']); $i += 2) { ?>
          <tr>
            <td class="button button-white button-animated">
              <form method="GET">
                <input type="submit" class="card"
                name="button<?php echo $i;?>"
                value="<?php display_card($_SESSION['cards'][$i]); ?>">
              </form>
            </td>
            <td class="button button-white button-animated">
              <form method="GET">
                <input type="submit" class="card"
                name="button<?php echo $i+1;?>"
                value="<?php display_card($_SESSION['cards'][$i+1]); ?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php };

  if ( $length > 10 ) { ?>

    <table>
      <thead>
        <!-- heading of the table -->
      </thead>

      <tbody>
        <?php for($i=0; $i < count($_SESSION['cards']); $i += 4) { ?>
          <tr>
            <td class="button button-white button-animated">
              <form method="get">
                <input type="submit" class="card"
                name="button<?php echo $i;?>"
                value="<?php display_card($_SESSION['cards'][$i]); ?>">
              </form>
            </td>
            <td class="button button-white button-animated">
              <form method="get">
                <input type="submit" class="card"
                name="button<?php echo $i+1;?>"
                value="<?php display_card($_SESSION['cards'][$i+1]); ?>">
              </form>
            </td>
            <td class="button button-white button-animated">
              <form method="get">
                <input type="submit" class="card"
                name="button<?php echo $i+2;?>"
                value="<?php display_card($_SESSION['cards'][$i+2]); ?>">
              </form>
            </td>
            <td class="button button-white button-animated">
              <form method="get">
                <input type="submit" class="card"
                name="button<?php echo $i+3;?>"
                value="<?php display_card($_SESSION['cards'][$i+3]); ?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  <?php } ?>
  <div class="">
    <br>
    <form method="get">
      <input class="button button-white button-animated"
      type="submit"
      name="reset"
      value="RESET CARDS">
    </form>

  </div>

  <p style="color=orange" ><?php echo $_SESSION['message']; ?></p>
  <br>
  <br>
  <br>

  <div class="">
    <form action='start-screen.php' method="post">
      <input class="button button-white button-animated"
      type="submit"
      name="back-to-start"
      value="Back to Start">
    </form>

  </div>
</div>
