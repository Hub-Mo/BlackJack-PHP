<?php
declare(strict_types=1);

class Player {
    protected array $cards = [];
    protected bool $lost = false;
    protected int $score = 0;
    protected const MAGICVAL = 21;

    public function __construct(Deck $deck){
    for ($i = 0; $i<2; $i++){
        array_push($this->cards, $deck->drawCard());
    }
    }

    public function hit(Deck $deck) {
        array_push($this->cards, $deck->drawCard());
        if($this->getScore()>self::MAGICVAL){
            $this->lost = true;
        }
    }
    public function surrender() {
        $this->lost = true;
    }

    public function getScore() : int{
        $this->score = 0;
        foreach($this->cards as $card){
            $this->score += $card->getValue();
        }
        return $this->score;
    }

    public function hasLost() : bool
    {
        if ($this->getScore() > self::MAGICVAL) {
            return $this->lost = true;
        }
        return $this->lost;
    }

    public function getCards() : array {
        return $this->cards;
    }
}