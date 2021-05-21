<?php

declare(strict_types=1);

namespace Mack\Game;

use Tests\TestCase;
use Illuminate\Http\Request;

/**
 * Test cases for the Score-class.
 */
class ScoreTest extends TestCase
{

    /**
     * Test instance of Score
     */
    public function testScore()
    {
        $score = new Score();
        $this->assertInstanceOf("\Mack\Game\Score", $score);
    }

    /**
     * Test to add ones score
     */
    public function testAddScoreOnes()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Aces";
        $savedDices = [1, 1, 1];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 3;
        $this->assertEquals($exp, $res["score"]);
    }

    /**
     * Test to add pair
     */
    public function testAddPair()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Pair";
        $savedDices = [1, 1];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 2;
        $this->assertEquals($exp, $res["score"]);
    }

    /**
     * Test to add two pair
     */
    public function testAddTwoPair()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Two Pair";
        $savedDices = [1, 1, 2, 2];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 6;
        $this->assertEquals($exp, $res["score"]);
    }

    /**
     * Test to add of a kind
     */
    public function testAddOfAKind()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "3 of a kind";
        $savedDices = [1, 1, 1];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 3;
        $this->assertEquals($exp, $res["score"]);
    }

    /**
     * Test to add straight
     */
    public function testAddSmallStraight()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Small Straight";
        $savedDices = [1, 2, 3, 4, 5];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 15;
        $this->assertEquals($exp, $res["score"]);
    }

        /**
     * Test to add straight
     */
    public function testAddLargeStraight()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Large Straight";
        $savedDices = [2, 3, 4, 5, 6];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 20;
        $this->assertEquals($exp, $res["score"]);
    }

    /**
     * Test to add full house
     */
    public function testAddFullHouse()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Full House";
        $savedDices = [1, 1, 1, 2, 2];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 7;
        $this->assertEquals($exp, $res["score"]);
    }


    /**
     * Test to add full house
     */
    public function testAddYatzy()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "YATZY";
        $savedDices = [1, 1, 1, 1, 1];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 50;
        $this->assertEquals($exp, $res["score"]);
    }


    /**
     * Test to add chance
     */
    public function testAddChance()
    {
        $score = new Score();
        $game = new PlayYatzy();
        $rounds = $game->getRounds();
        $choosenRound = "Chance";
        $savedDices = [1, 1, 1, 1, 1];

        $res = $score->addScore($choosenRound, $savedDices, $rounds);
        $exp = 5;
        $this->assertEquals($exp, $res["score"]);
    }

    // /**
    //  * Test to get the rounds
    //  */
    // public function testGetRounds()
    // {
    //     $game = new PlayYatzy();

    //     $res = $game->getRounds();

    //     $this->assertIsArray($res);
    // }

    // /**
    //  * Test to get the starting number of dices
    //  */
    // public function testGetFirstNumberOfDices()
    // {
    //     $game = new PlayYatzy();

    //     $res = $game->getFirstNumberOfDices();
    //     $exp = 5;
    //     $this->assertEquals($exp, $res);
    // }

    // /**
    //  * Test to get the current number of dices
    //  */
    // public function testGetNumberOfDices()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->getNumberOfDices($request);
    //     $this->assertIsInt($res);
    // }

    // /**
    //  * Test to get ckecked boxes
    //  */
    // public function testGetCheckedBoxes()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->getCheckedBoxes($request);
    //     $this->assertIsInt($res);
    // }

    // /**
    //  * Test to get saved dices
    //  */
    // public function testGetSavedDices()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->getSavedDices($request);
    //     $this->assertIsArray($res);
    // }

    // /**
    //  * Test to get choosen rounds fail
    //  */
    // public function testGetNoChoosenRound()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->getChoosenRound($request);
    //     $this->assertNull($res);
    // }

    // /**
    //  * Test to set rounds
    //  */
    // public function testSetRounds()
    // {
    //     $game = new PlayYatzy();
    //     $rounds = [1, 2, 3];
    //     $res = $game->setRounds($rounds);
    //     $this->assertEquals($res, $res);
    // }

    // /**
    //  * Test to play game
    //  */
    // public function testPlayGame()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->playGame("rolldices", 1, $request);
    //     $this->assertIsArray($res);
    // }

    // /**
    //  * Test to roll dices
    //  */
    // public function testRollDices()
    // {
    //     $game = new PlayYatzy();
    //     $request = new Request();

    //     $res = $game->rollDices(1, $request);
    //     $this->assertIsArray($res);
    // }
}
