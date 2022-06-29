<?php
declare(strict_types=1);
session_start();
require 'classes/Card.class.php';
require 'classes/Suit.class.php';
require 'classes/Deck.class.php';
require 'classes/Blackjack.class.php';
require 'classes/Player.class.php';
require 'classes/Dealer.class.php';

if (isset($_SESSION['blackJack'])) {
    $_SESSION['blackJack'] = new Blackjack();
    asignSessionValues();
}

function asignSessionValues(){
    $_SESSION["playerHasLost"] = false;
    $_SESSION["DealerHasLost"] = false;
    $_SESSION['playerScore'] = $_SESSION['blackJack']->getPlayer()->getScore();
    $_SESSION['DealerScore'] = $_SESSION['blackJack']->getDealer()->getScore();
}

if(isset($_POST['hit'])){
    if(!$_SESSION['playerHasLost']){
        $_SESSION['blackJack']->getPlayer()->hit($_SESSION['blackJack']->getDeck());
    }
}
if(isset($_POST['stand'])){
    $_SESSION['blackJack']->getDealer()->hit($_SESSION['blackJack']->getDeck());
    $_SESSION['DealerHasLost'] = $_SESSION['blackJack']->getDealer()->hasLost();
}

if(isset($_POST['surrender'])){
    $_SESSION['blackJack']->getPlayer()->surrender();
    $_SESSION['playerScore'] = $_SESSION['blackJack']->getPlayer()->hasLost();
}


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
            <p style="font-size: 6rem">
            <?php
            foreach ($_SESSION['blackJack']->getPlayer()->getCards() as $card) {
            echo $card->getUnicodeCharacter(true);
            echo '&emsp;';}
            ?>
            </p>
            <p>points:
                <?php
                    echo $_SESSION['playerScore'];
                ?>
            </p>
        </div>
        <div class="dealerField test">
            <h2>dealer</h2>
            <p  style="font-size: 6rem">
                <?php
                foreach ($_SESSION['blackJack']->getDealer()->getCards() as $card) {
                    echo $card->getUnicodeCharacter(true);
                    echo '&emsp;';}
                ?>
            </p>
            <p>points:
                <?php
                    echo $_SESSION['DealerScore'];
                ?>
            </p>
        </div>
    </div>

</div>

<div class="center">
    <form method="post" action="index.php">
        <button name="hit" value="hit" type="submit">hit</button>
        <button name="stand" value="stand" type="submit">stand</button>
        <button name="surrender" value="surrender" type="submit">surrender</button
    </form>
</div>


</body>
</html>





