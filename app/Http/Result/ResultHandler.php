<?php

declare(strict_types=1);

namespace Mack\Result;

use App\Models\Result;

/**
 * Handle data from table result.
 *
 */
class ResultHandler
{
    public function addResult($data)
    {
        // Validate the request..
        $result = new Result();

        $result->aces = $data["Aces"];
        $result->twos = $data["Twos"];
        $result->threes = $data["Threes"];
        $result->fours = $data["Fours"];
        $result->fives = $data["Fives"];
        $result->sixes = $data["Sixes"];
        $result->sum = $data["SUM (63)"];
        $result->bonus = $data["BONUS"];
        $result->pair = $data["Pair"];
        $result->twopair = $data["Two Pair"];
        $result->threeofakind = $data["3 of a kind"];
        $result->fourofakind = $data["4 of a kind"];
        $result->smallstraight = $data["Small Straight"];
        $result->largestraight = $data["Large Straight"];
        $result->fullhouse = $data["Full House"];
        $result->chance = $data["Chance"];
        $result->yatzy = $data["YATZY"];
        $result->total = $data["TOTAL"];

        $result->save();
    }
}
