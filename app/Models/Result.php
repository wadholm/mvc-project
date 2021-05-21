<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Result
 *
 * @property int $id
 * @property int $aces
 * @property int $twos
 * @property int $threes
 * @property int $fours
 * @property int $fives
 * @property int $sixes
 * @property int $sum
 * @property int $bonus
 * @property int $pair
 * @property int $twopair
 * @property int $threeofakind
 * @property int $fourofakind
 * @property int $smallstraight
 * @property int $largestraight
 * @property int $fullhouse
 * @property int $chance
 * @property int $yatzy
 * @property int $total
 * @property int $score
 * @method static Result orderBy('id', 'desc')
 */
class Result extends Model
{
    use HasFactory;

    public $table = 'result';

    protected $fillable = ['aces','yatzy'];

    /**
     *
     *
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function presentResult()
    {
        $this->result = self::select('bonus', 'yatzy', 'total')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return $this->result;
    }

    public function addResult($data)
    {
        // Validate the request..

        $this->aces = $data["Aces"];
        $this->twos = $data["Twos"];
        $this->threes = $data["Threes"];
        $this->fours = $data["Fours"];
        $this->fives = $data["Fives"];
        $this->sixes = $data["Sixes"];
        $this->sum = $data["SUM (63)"];
        $this->bonus = $data["BONUS"];
        $this->pair = $data["Pair"];
        $this->twopair = $data["Two Pair"];
        $this->threeofakind = $data["3 of a kind"];
        $this->fourofakind = $data["4 of a kind"];
        $this->smallstraight = $data["Small Straight"];
        $this->largestraight = $data["Large Straight"];
        $this->fullhouse = $data["Full House"];
        $this->chance = $data["Chance"];
        $this->yatzy = $data["YATZY"];
        $this->total = $data["TOTAL"];

        $this->save();
    }
}
