<?php
declare(strict_types=1);
session_start();
require 'include/AutoLoader.inc.php';
//require 'classes/Card.class.php';
//require 'classes/Suit.class.php';
//require 'classes/Deck.class.php';
//require 'classes/Blackjack.class.php';
//require 'classes/Player.class.php';
//require 'classes/Dealer.class.php';





$_SESSION['blackJack'] = new Blackjack();
$blackJack = $_SESSION['blackJack'];

$player = $blackJack->getPlayer();
$dealer = $blackJack->getDealer();
$deck = $blackJack->getDeck();

if(isset($_POST['hit'])){
    $player->hit($deck);
    if($player->hasLost() == true){
        echo "the player loses the game";
    }
}
if(isset($_POST['stand'])){
    $dealer->hit($deck);
    if($dealer->hasLost() == true){
        echo "the player wins the game";
    }
}
if(isset($_POST['surrender'])){
    $player->hasLost();
    echo "dealer wins";
}

$_SESSION['$playerScore'] = $player->getScore();
$_SESSION['$DealerScore'] = $dealer->getScore();



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Blackjack</h1>
<div class="playGround test" >
    <div class="winnerDisplay test"></div>
    <div class="playerContainer test">
        <div class="playerField test">
            <h2>Player</h2>
            <p>card:</p>
            <p>points:  <?= $_SESSION['$playerScore'] ?></p>
        </div>
        <div class="dealerField test">
            <h2>dealer</h2>
            <p>cards:</p>
            <p>points: <?= $_SESSION['$DealerScore'] ?></p>
        </div>
    </div>

</div>

<div class="center">
    <form method="post" action="index.php">
        <button name="hit" type="submit">hit</button>
        <button name="stand" type="submit">stand</button>
        <button name="surrender" type="submit">surrender</button
    </form>
</div>


</body>
</html>





