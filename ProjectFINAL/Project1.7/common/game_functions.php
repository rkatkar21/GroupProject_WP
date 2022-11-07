<?php

require_once('functions.php');

function start_game($current_level) {
    //starts the game by initializing current level, placing cards and number of misses
    $_SESSION['cards'] = pick_cards($current_level);

    //DEBUG
    // echo "<pre>Current Level: $current_level \n";
    // print_r($cards);
    // echo "</pre>";
}

function pick_cards($current_level){
    //start level based on $current_level integer and returns a properly sized array for the level
    global $deck, $cards, $card_selection;

    $length = $card_selection[$current_level];//chose how many cards for the level

    $cards = array_slice($deck, 0, $length, true);

    shuffle($cards);

    return $cards;
}

function display_card($card){
    //displays the image on the card corresponding to the matched status
    if ($card[2] == "matched" || $card[3] == "clicked") {
        echo $card[0];//display the face of the card
    }
    else {
        echo $card[1]; //display the back of the card if matched
    }
}

function play_game($cards,$status){
    if (count($_GET) != 0) {
        click($cards);
    }
    //check only if there are two cards stored in match_check
    $count = count($_SESSION['match_check']);
    if ($count >= 2) {
        check_match($cards);
    }
    if ($_SESSION['match_num'] == 12) {
        endgame();
    }
    elseif ( $_SESSION['match_num'] == (count($cards)/2) ) {
        nextlevel();
    }
}

function check_match($cards){
    //test if player has chosen a match from the two clicked cards
    $first_card = array_pop($_SESSION['match_check']);
    $second_card = array_pop($_SESSION['match_check']);
    if ($first_card[0] == $second_card[0]) {

        $_SESSION['game_status'] = "match";
        $_SESSION['message'] = "You found a matched pair!!! Way to go!";

        $_SESSION['cards'][$first_card[1]][2] = "matched";//set the status first card of the match to matched
        $_SESSION['cards'][$second_card[1]][2] = "matched";//set the status second card of the match to matched

        $_SESSION['match_num']++;
    }
}

//function to check num_flipped
function click($cards) {
    //click a card and change $card[3] clicked status from unclicked to clicked
    $count = count($cards);

    if ($_SESSION['game_status'] == "cleared" && isset($_GET['reset'])) {
        redirect('start-screen.php');
    }

    //count number of face up cards
    $face_up = 0;
    for ($i = 0; $i < $count; $i++) {
        if ($cards[$i][2] != "matched" && $cards[$i][3] == "clicked") {
            $face_up++;
        }
    }
    //player has 2 cards face up
    if ($face_up >= 2) {
        //reset when the reset button is pushed only when two cards are face up
        if (isset($_GET['reset'])) {
            reset_cards();
        } else {
        $_SESSION['message'] = "Press reset to continue the game.";
        }
    }
    else {//prevent a player from turning card over with 2 face up
        //prevent player from reseting till 2 are face up
        $_SESSION['message'] = "Click on tiles to flip and find matching pairs!";

        if (isset($_GET['reset'])) {
            $_SESSION['message'] = "Flip two cards before resetting!";
        }

        //find and call the appropriate button function and increase the number of flipped cards
        for($i = 0; $i < $count; $i++) {

            if(isset($_GET['button'.$i])) {
                //only allow button presses on face down cards
                if ($cards[$i][2] == "matched" || $cards[$i][3] == "clicked") {

                    $_SESSION['message'] = "Please choose a face down tile.";
                } else {

                    call_user_func_array("button_click",array($i,$face_up));//change the index 3

                    store_card(array($cards[$i][0],$i));//push face and card number on session stack match_check
                }
            }
        }

    }
}

function store_card($card){
    array_push($_SESSION['match_check'],$card);
}

function button_click($index,$face_up) {
    if ($_SESSION['cards'][$index][3] == "unclicked") {
        $_SESSION['cards'][$index][3] = "clicked";
    }
}

function reset_cards(){
    for($i = 0; $i < $_SESSION['count']; $i++) {

        if ($_SESSION['cards'][$i][2] != "matched") {
            $_SESSION['cards'][$i][3] = "unclicked";
        }
    }
    $_SESSION['misses']++;
    $_SESSION['game_status'] = "running";
    $_SESSION['message'] = "Click on tiles to flip and find matching pairs!";
    // redirect('play.php');
}

function nextlevel(){
    $_SESSION['game_status'] = "off";
    $_SESSION['message'] = "Congratulations! You have cleared level " . $_SESSION['level'] . "! Hit reset to continue to the next level.";
    $_SESSION['level']++;
    $_SESSION['match_num'] = 0;
    $_SESSION['match_check'] = [];
}

function endgame(){
    //quit game in the middle
    $_SESSION['message'] = "Congratulations! You have cleared the game! You scored " . $_SESSION['misses'] . "! Hit reset or Back to Start to see highscores!";

    save_highscore($_SESSION['name'], $_SESSION['misses']);
    $_SESSION['game_status'] = "cleared";
}



 ?>
