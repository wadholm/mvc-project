<?php

declare(strict_types=1);

namespace Mack\Dice;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for the Dice Dice-class.
 */
class HistogramTraitTest extends TestCase
{

    /**
     * Construct DiceHand and test to print histogram
     */
    public function testPrintHistogram()
    {
        // Arrange
        $die = new CheatDice(1);
        $die->roll();
        $die = new CheatDice(2);
        $die->roll();
        $die = new CheatDice(3);
        $die->roll();
        $die = new CheatDice(4);
        $die->roll();
        $die = new CheatDice(5);
        $die->roll();
        $die = new CheatDice(6);
        $die->roll();
        $res = $die->printHistogram();
        // $diceHand->addDice(new GraphicalDice());
        // $res = $diceHand->roll();

        // $res = $diceHand->getHand();
        $this->assertIsString($res);
    }
}
