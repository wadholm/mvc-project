<?php

declare(strict_types=1);

namespace Mack\Dice;

/**
 * Cheat Dice.
 */
class CheatDice extends GraphicalDice
{
    // private const FACES = 6;
    public $cheat = 6;

    /**
     * Constructor to initiate the dice with six number of sides.
     */
    public function __construct($cheat)
    {
        // parent::__construct(self::FACES);
        $this->cheat = $cheat;
    }

    public function roll(): int
    {
        $this->roll = $this->cheat;
        // $this->addToHistogram($this->roll);

        return $this->roll;
    }
}
