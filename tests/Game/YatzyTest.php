<?php

declare(strict_types=1);

namespace Mack\Game;

use Tests\TestCase;
use Illuminate\Http\Request;

/**
 * Test cases for the PlayYatzy-class.
 */
class YatzyTest extends TestCase
{
    /**
     * Test to start game
     */
    public function testStartGame()
    {
        $game = new PlayYatzy();

        $res = $game->startGame();
        $exp = "yatzy started";
        $this->assertEquals($exp, $res);
    }

    /**
     * Test to get the rounds
     */
    public function testGetRounds()
    {
        $game = new PlayYatzy();

        $res = $game->getRounds();

        $this->assertIsArray($res);
    }

    /**
     * Test to get the starting number of dices
     */
    public function testGetFirstNumberOfDices()
    {
        $game = new PlayYatzy();

        $res = $game->getFirstNumberOfDices();
        $exp = 5;
        $this->assertEquals($exp, $res);
    }

    /**
     * Test to get the current number of dices
     */
    public function testGetNumberOfDices()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->getNumberOfDices($request);
        $this->assertIsInt($res);
    }

    /**
     * Test to get ckecked boxes
     */
    public function testGetCheckedBoxes()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->getCheckedBoxes($request);
        $this->assertIsInt($res);
    }

    /**
     * Test to get saved dices
     */
    public function testGetSavedDices()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->getSavedDices($request);
        $this->assertIsArray($res);
    }

    /**
     * Test to get choosen rounds fail
     */
    public function testGetNoChoosenRound()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->getChoosenRound($request);
        $this->assertNull($res);
    }

    /**
     * Test to set rounds
     */
    public function testSetRounds()
    {
        $game = new PlayYatzy();
        $rounds = [1, 2, 3];
        $res = $game->setRounds($rounds);
        $this->assertEquals($res, $res);
    }

    /**
     * Test to play game
     */
    public function testPlayGame()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->playGame("rolldices", 1, $request);
        $this->assertIsArray($res);
    }

    /**
     * Test to roll dices
     */
    public function testRollDices()
    {
        $game = new PlayYatzy();
        $request = new Request();

        $res = $game->rollDices(1, $request);
        $this->assertIsArray($res);
    }
}
