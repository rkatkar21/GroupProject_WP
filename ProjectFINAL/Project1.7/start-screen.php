<?php
session_start();

require_once('common/config.php');
require_once('common/functions.php');
require_once('common/game_config.php');

ensure_user_is_authenticated();




include('common/header.php');

//set session variables

//game_status = off, running, match
$_SESSION['game_status'] = "off";

//level 1-6
$_SESSION['level'] = $starting_level;

//determines highscore(lowest)
$_SESSION['misses'] = $misses_ini;

//array to hold the cards in play
$_SESSION['cards'] = $cards;

//number of cards on the playing field
$_SESSION['count'] = 0;

//number of matches used to determine when to end the game
$_SESSION['match_num'] = 0;

//holds the face card to check if the two clicked cards match
//$arr = [face,card number]
$_SESSION['match_check'] = [];

$_SESSION['message'] = "Welcome to the match game, click on tiles to flip and find matching pairs! Good luck!";

?>
<link rel="stylesheet" href="styles.css">
<div class="container">
    <div class="row">
        <h1>Welcome <?php echo $_SESSION['name'];?>!</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="register.php">Create Account</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="highscore">
            <table>
                <thead>
                    <tr>
                        <th colspan="2">HIGHSCORES</th>
                    </tr>
                    <tr>
                        <th>Rank</th>
                        <th>User</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $accounts = sort_highscore($accounts);
                    for ($i=0; $i < 5; $i++) { ?>
                        <tr>
                            <td class="rank"><?php echo $i+1; ?></td>
                            <td><?php echo $accounts[$i]['name']; ?></td>
                            <td><?php echo $accounts[$i]['highscore']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





<div class="container">
    <div class="row">
        <form class="" action="play.php" method="get">
            <fieldset>
                <input type="submit" name="play" value="New Game">
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
        <!-- Display Highscores -->
    </div>

</div>


<?php include('common/footer.php'); ?>
