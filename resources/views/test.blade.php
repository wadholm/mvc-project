<?php

use Mack\Dice\GraphicalDice;
use Mack\Dice\DiceHand;
use Mack\Helper\Helper;

$hand = new DiceHand();

$hand->addDice(new GraphicalDice());
$hand->addDice(new GraphicalDice());

$data["graphicalDice"] = [];

$diceHand = new DiceHand();
$helper = new Helper();

$diceHand = $helper->addDices2($diceHand, 2, [5, 6, 6]);
$diceHand->roll();
echo $diceHand->getHand();


$hand->roll();

$playerSum = $hand->sum();

$data["graphicalDice"] = $diceHand->getGraphics();

?>

<h1>{{ $header }}</h1>

<p>{{ $message }}</p>

<p>Summa: {{ $playerSum }}</p>


<p class="dice-utf8">
@foreach ($data["graphicalDice"] as $dice)
    <i class="dice">{{ $dice }}</i>
    <i class="{{ $dice }}"></i>
@endforeach

