<?php

declare(strict_types=1);

namespace Mack\Game;

/**
 * Class Score.
 */
class Score
{
    public $res;
    public $score = 0;
    public $getBonus = 63;
    public $roundValues = array(
        "Aces" => 1, "Twos" => 2, "Threes" => 3, "Fours" => 4, "Fives" => 5, "Sixes" => 6
        );
    public $rounds;

    public function addOne2Six($choosenRound, $savedDices)
    {
        foreach ($this->roundValues as $key => $value) {
            if ($choosenRound == $key) {
                foreach ($savedDices as $dice) {
                    if ($dice == $value) {
                        $this->score += $dice;
                    }
                }
                $this->rounds["SUM (63)"] += $this->score;
                if ($this->rounds["SUM (63)"] >= $this->getBonus) {
                    $this->rounds["BONUS"] = 50;
                }
            }
        }
    }

    public function addEitherPair($choosenRound, $savedDices)
    {
        $start = $choosenRound[0];
        if ($start == "P") {
            $this->addPair($savedDices);
        } elseif ($start == "T") {
            $this->addTwoPair($savedDices);
        }
    }

    public function addPair($savedDices)
    {
        $countedValues = array_count_values($savedDices);
        arsort($countedValues);
        foreach ($countedValues as $key => $value) {
            if ($value >= 2) {
                $this->score = $key * 2;
                break;
            }
        }
    }

    public function addTwoPair($savedDices)
    {
        $counter = 0;
        $score2add = 0;
        $countedValues = array_count_values($savedDices);
        arsort($countedValues);
        foreach ($countedValues as $key => $value) {
            if ($value >= 2) {
                $counter++;
                $score2add += ($key * 2);
                if ($counter == 2) {
                    $this->score = $score2add;
                    break;
                }
            }
        }
    }

    public function addOfAKind($choosenRound, $savedDices)
    {
        $numberOfDices = $choosenRound[0];
        $countedValues = array_count_values($savedDices);
        // arsort($countedValues);
        foreach ($countedValues as $key => $value) {
            if ($value >= $numberOfDices) {
                $this->score = $key * $numberOfDices;
                break;
            }
        }
    }

    public function addStraight($choosenRound, $savedDices)
    {
        $start = 0;
        $score2add = 0;
        $getSize = $choosenRound[0];
        if ($getSize == "S") {
            $start = 1;
            $score2add = 15;
        } elseif ($getSize == "L") {
            $start = 2;
            $score2add = 20;
        }
        $counter = 0;
        arsort($savedDices);
        for ($i = $start; $i < ($start + 5); $i++) {
            if (in_array($i, $savedDices)) {
                $counter++;
                if ($counter == 5) {
                    $this->score = $score2add;
                    break;
                }
            }
        }
    }

    public function addFullHouse($savedDices)
    {
        $flag4Three = false;
        $flag4Pair = false;
        $score2add = 0;
        $countedValues = array_count_values($savedDices);
        arsort($countedValues);
        foreach ($countedValues as $key => $value) {
            if ($value == 3) {
                $flag4Three = true;
                $score2add += ($key * 3);
            } elseif ($value == 2) {
                $flag4Pair = true;
                $score2add += ($key * 2);
            }
        }
        if ($flag4Three == true && $flag4Pair == true) {
            $this->score = $score2add;
        }
    }

    public function addYatzy($savedDices)
    {
        $countedValues = array_count_values($savedDices);
        // arsort($countedValues);
        foreach ($countedValues as $value) {
            if ($value >= 5) {
                $this->score = 50;
                break;
            }
        }
    }

    public function addChance($savedDices)
    {
        foreach ($savedDices as $dice) {
            $this->score += $dice;
        }
    }

    public function addScore($choosenRound, $savedDices, $rounds)
    {
        $this->score = 0;
        $this->rounds = $rounds;

        if (array_key_exists($choosenRound, $this->roundValues)) {
            $this->addOne2Six($choosenRound, $savedDices);
        }

        $exploded = explode(" ", $choosenRound);

        switch (end($exploded)) {
            case "Pair":
                $this->addEitherPair($choosenRound, $savedDices);
                break;
            case "kind":
                $this->addOfAKind($choosenRound, $savedDices);
                break;
            case "Straight":
                $this->addStraight($choosenRound, $savedDices);
                break;
            case "House":
                $this->addFullHouse($savedDices);
                break;
            case "Chance":
                $this->addChance($savedDices);
                break;
            case "YATZY":
                $this->addYatzy($savedDices);
                break;
        }

        // switch ($choosenRound) {
        //     case "Pair":
        //         $this->addPair($savedDices);
        //         break;
        //     case "Two Pair":
        //         $this->addTwoPair($savedDices);
        //         break;
        //     case "3 of a kind":
        //         $this->addOfAKind($choosenRound, $savedDices);
        //         break;
        //     case "4 of a kind":
        //         $this->addOfAKind($choosenRound, $savedDices);
        //         break;
        //     case "Small Straight":
        //         $this->addStraight($choosenRound, $savedDices);
        //         break;
        //     case "Large Straight":
        //         $this->addStraight($choosenRound, $savedDices);
        //         break;
        //     case "Full House":
        //         $this->addFullHouse($savedDices);
        //         break;
        //     case "Chance":
        //         $this->addChance($savedDices);
        //         break;
        //     case "YATZY":
        //         $this->addYatzy($savedDices);
        //         break;
        // }
        $this->rounds[$choosenRound] = $this->score;
        $this->rounds["TOTAL"] += $this->score;

        $this->res["score"] = $this->score;
        $this->res["rounds"] = $this->rounds;
        $this->res["message"] = $choosenRound . " : You scored " . $this->score . ". Your score will be added. ";
        return $this->res;
    }
}
