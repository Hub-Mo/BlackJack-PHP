<?php
declare(strict_types=1);

class Player {
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck){
        for ($i = 0; $i < 2; $i++){
            array_push($this->cards, $deck->drawCard());
        }


    }

    public function hit($deck) {
        array_push($this->cards, $deck->drawCard());
        if($this->getScore()>21){
            $this->hasLost();
        }
        return $this->cards;
    }
    public function surrender() {
        $this->hasLost();
    }
    public function getScore() {
        $score = 0;
        foreach($this->cards as $card){
            $score += $card->getValue();
        }
        return $score;
    }
    public function hasLost() {
        $this->lost = true;
    }
}