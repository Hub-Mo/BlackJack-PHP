<?php
declare(strict_types=1);
session_start();
require 'include/AutoLoader.inc.php';


$_SESSION['blackJack'] = new Blackjack();
$player = new Player();
if(isset($_POST['hit'])){
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
</head>
<body>


    <form method="post" action="index.php">
        <button name="hit" type="submit">hit</button>
        <button name="stand" type="submit">stand</button>
        <button name="surrender" type="submit">surrender</button
    </form>


</body>
</html>





