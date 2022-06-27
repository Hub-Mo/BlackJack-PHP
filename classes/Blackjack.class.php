<?php
declare(strict_types = 1);

class Blackjack{

    private $player;
    private $dealer;
    private $deck;



    public function __construct(){

        $deck = new Deck();
        $deck->shuffle();
        $this->deck = $deck;
        $this->player = new Player($deck);
        $this->dealer = new Dealer($deck);
    }

    public function getPlayer(){
        return $this->player;
    }
    public function getDealer(){
        return $this->dealer;
    }
    public function getDeck(){
        return $this->deck;
    }
}