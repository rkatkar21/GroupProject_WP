<?php

//start the number of misses at 0
$misses_ini = 0;

//cards in play
$cards = [];

//initialize level at 1
$starting_level = 1;

//for use in array_slice as the length
$card_selection = [
    1 => 6,
    2 => 8,
    3 => 10,
    4 => 12,
    5 => 16,
    6 => 24
];
/*
LEVEL SELECTION
level 1: 0-5 for 3 matches
level 2: 0-7 for 4 matches
level 3: 0-9 for 5 matches
level 4: 0-11 for 6 matches
level 5: 0-15 for 8 matches
level 6: 0-23 for 12 matches
*/
// $deck = [$i][face,back,status]
//matched status = matched or unmatched(default)
//click status = clicked or unclicked
$deck = [
    0 => ['👺','🎃',"unmatched","unclicked"],
    1 => ['👺','🎃',"unmatched","unclicked"],
    2 => ['🤡','🎃',"unmatched","unclicked"],
    3 => ['🤡','🎃',"unmatched","unclicked"],
    4 => ['🧙','🎃',"unmatched","unclicked"],
    5 => ['🧙','🎃',"unmatched","unclicked"],
    6 => ['🧛','🎃',"unmatched","unclicked"],
    7 => ['🧛','🎃',"unmatched","unclicked"],
    8 => ['❤️','🎃',"unmatched","unclicked"],
    9 => ['❤️','🎃',"unmatched","unclicked"],
    10 => ['💀','🎃',"unmatched","unclicked"],
    11 => ['💀','🎃',"unmatched","unclicked"],
    12 => ['😈','🎃',"unmatched","unclicked"],
    13 => ['😈','🎃',"unmatched","unclicked"],
    14 => ['👻','🎃',"unmatched","unclicked"],
    15 => ['👻','🎃',"unmatched","unclicked"],
    16 => ['👾','🎃',"unmatched","unclicked"],
    17 => ['👾','🎃',"unmatched","unclicked"],
    18 => ['🤖','🎃',"unmatched","unclicked"],
    19 => ['🤖','🎃',"unmatched","unclicked"],
    20 => ['🧟','🎃',"unmatched","unclicked"],
    21 => ['🧟','🎃',"unmatched","unclicked"],
    22 => ['🗡️','🎃',"unmatched","unclicked"],
    23 => ['🗡️','🎃',"unmatched","unclicked"],
];

//list of button functions
// $button_calls = [
//     button0(),
//     button1(),
//     button2(),
//     button3(),
//     button4(),
//     button5(),
//     button6(),
//     button7(),
//     button8(),
//     button9(),
//     button10(),
//     button11(),
//     button12(),
//     button13(),
//     button14(),
//     button15(),
//     button16(),
//     button17(),
//     button18(),
//     button19(),
//     button20(),
//     button21(),
//     button22(),
//     button23(),
// ];














 ?>
