<?php

declare(strict_types=1);

namespace Mack\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Dice CheatDice-class.
 */
class CheatDiceTest extends TestCase
{

    /**
     * Construct dice and verify that the dice has the expected
     * properties, use no arguments.
     */
    public function testCreateCheatDice()
    {
        $die = new CheatDice(6);
        $this->assertInstanceOf("\Mack\Dice\CheatDice", $die);

        // $res = $die->faces();
        // $exp = 6;
        // $this->assertEquals($exp, $res);

        $res = $die->roll();
        $exp = 6;
        $this->assertEquals($exp, $res);
    }

    // /**
    //  * Test function to cheat for roll
    //  */
    // public function testRollCheat()
    // {
    //     $die = new CheatDice(6);
    //     $res = $die->roll();
    //     $exp = 3;
    //     $this->assertEquals($exp, $res);
    // }
}
