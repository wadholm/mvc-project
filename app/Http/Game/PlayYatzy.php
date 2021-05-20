<?php

declare(strict_types=1);

namespace Mack\Game;

use Mack\Dice\DiceHand;
use Mack\Helper\Helper;
use Mack\Game\Score;

// use function Mos\Functions\{
//     destroySession,
//     redirectTo,
//     renderView,
//     renderTwigView,
//     sendResponse,
//     url
// };


/**
 * Class PlayYatzy.
 */
class PlayYatzy
{
    public $numberOfDices = 5;
    public $checkedBoxes;
    public $savedDices = [];
    public $choosenRound;
    public $res;
    public $graphics;
    public $dices = [
        "dice-1",
        "dice-2",
        "dice-3",
        "dice-4",
        "dice-5"
    ];
    public $rounds = array(
        "Aces" => "", "Twos" => "", "Threes" => "", "Fours" => "", "Fives" => "", "Sixes" => "",
        "SUM (63)" => 0, "BONUS" => 0, "Pair" => "", "Two Pair" => "", "3 of a kind" => "","4 of a kind" => "",
        "Small Straight" => "", "Large Straight" => "", "Full House" => "", "Chance" => "", "YATZY" => "", "TOTAL" => 0
        );

    public function startGame($request)
    {
        // if (isset($_POST["start"])) {
        //     $_SESSION["result"] = null;
        //     $_SESSION["score"] = null;
        //     $this->resetSessionRounds();
        // }
        if ($request->has('start')) {
            // session(['result' => null]);
            // session(['score' => null]);
            session(['rounds' => null]);
            // $this->resetSessionRounds($request);
        }
    }

    public function getRounds()
    {
        return $this->rounds;
    }

    public function getFirstNumberOfDices()
    {
        $this->numberOfDices = 5;
        return $this->numberOfDices;
    }

    public function getNumberOfDices($request)
    {
        $this->numberOfDices = (int)$request->input('dices') ?? 0;
        return $this->numberOfDices;
    }

    public function getCheckedBoxes($request)
    {
        foreach ($this->dices as $dice) {
            if ($request->has($dice)) {
                $this->checkedBoxes++;
            }
            // if (isset($_POST[$dice]) && $_POST[$dice] == $_POST["round"]) {
            //     $this->checkedBoxes++;
            // }
        }
        return $this->checkedBoxes;
    }

    public function getSavedDices($request)
    {
        foreach ($this->dices as $dice) {
            if ($request->has($dice)) {
                $this->savedDices[] = (int)$request->input($dice);
            }
            // if (isset($_POST[$dice]) && $_POST[$dice] == $_POST["round"]) {
            //     $this->checkedBoxes++;
            // }
        }
        return $this->savedDices;
    }

    public function getChoosenRound($request)
    {
        if ($request->has("choosenRound")) {
            $this->choosenRound = $request->input("choosenRound");
        }
        // if (isset($_POST[$dice]) && $_POST[$dice] == $_POST["round"]) {
        //     $this->checkedBoxes++;
        // }
        return $this->choosenRound;
    }

    public function setRounds($savedRounds)
    {
        $this->rounds = $savedRounds;
    }

    public function playGame($rollDices, $roll, $request)
    {
        if ($rollDices != null && $rollDices == "rolldices") {
            $this->getCheckedBoxes($request);
            $this->numberOfDices = $this->getNumberOfDices($request) - $this->checkedBoxes;
            $this->savedDices = $this->getSavedDices($request);
            $this->res = $this->rollDices($roll, $request);
        }
        return $this->res;
    }

    public function rollDices($roll, $request)
    {
        $this->res["roll"] = $roll;

        $diceHand = new DiceHand();
        if ($roll == 1) {
            $this->numberOfDices = $this->getFirstNumberOfDices();
        }
        $helper = new Helper();

        $diceHand = $helper->addDices2($diceHand, $this->numberOfDices, $this->savedDices);
        $this->res["numberOfDices"] = $this->numberOfDices;


        if (($this->numberOfDices + count($this->savedDices)) != 0) {
            $diceHand->roll();
        }

        $this->res["graphics2rolls"] = $diceHand->getGraphics2Rolls();
        $this->res["message"] = "Select dices to keep, then reroll or save result.";
        $this->res["sum"] = $diceHand->sum();


        if ($roll == 4 || $request->has("choosenRound")) {
            $this->getChoosenRound($request);
            $score = new Score();
            $returned = $score->addScore($this->choosenRound, $this->savedDices, $this->rounds);
            $this->rounds = $returned["rounds"];
            $this->res["message"] = $returned["message"];
            $this->res["roll"] = 0;
            $this->res["graphics2rolls"] = null;
            $request->session()->put('rounds', $this->rounds);
            $this->res["rounds"] = $this->rounds;

            if (array_search("", $this->rounds, true) == false) {
                $this->res["result"] = "result";
            }
        }
        return $this->res;
    }
}
