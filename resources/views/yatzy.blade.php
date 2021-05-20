<?php

$play = url("/yatzy/play");

$header = $header ?? null;
$message = $message ?? null;

$diceHand = $diceHand ?? null;
$numberOfDices = $numberOfDices ?? null;
$sum = $sum ?? null;
// $graphicalDice = $graphicalDice ?? null;
$roll = $roll ?? null;
$required = "";
$rounds = $rounds ?? null;
$graphics2rolls = $graphics2rolls ?? null;
// $rounds = array("Ones"=>3, "Twos"=>"", "Threes"=>"", "Fours"=>"", "Fives"=>"", "Sixes"=>"",
// "TOTAL"=>"", "BONUS"=>"", "Pair"=>"", "Two Pair"=>"", "3 of a kind"=>"",
// "4 of a kind"=>"", "Small Straight"=>"", "Large Straight"=>"", "Full house"=>"", "Chance"=>"", "YATZY"=>"", "TOTAL"=>"");

if ($roll == 3) {
    $required = "required";
}


?>

<form class="dice-form" method="POST" action="{{ $play }}">
<div class="text">
<h1>{{  $header  }}</h1>

<p>{{  $message }}</p>

@if ($roll != 0)
<p>Roll {{ $roll }}</p>
<p>Sum: {{  $sum }}</p>


</div>

<table>
    <tr>
        <th>Scorebox</th>
        <th> </th>
    </tr>
    @foreach ($rounds as $r => $r_value)
    <tr>
        <td>{{ $r }}</td>
        @if ($r_value === "" && $r != "BONUS")
        <td>
            <input class="checkbox" type="radio" id="choosenRound" name="choosenRound" value="{{ $r }}" {{ $required}}>
        </td>
        @else
        <td>{{ $r_value }}</td>
        @endif
    </tr>
    @endforeach
</table>
@endif


@csrf
@if ($graphics2rolls != null)
@php
    $i = 0;
@endphp

<div class="graphics">

@foreach ($graphics2rolls as $rolled)
        <input class="checkbox" type="checkbox" id="dice-{{ $i += 1 }}" name="dice-{{ $i }}" value="{{ Arr::get($rolled, 'value') }}">
        <label class="checkbox-graphics" for="dice-{{ $i }}">{{ Arr::get($rolled, 'graphic') }}</label><br>
@endforeach
@endif

<input type="hidden" id="dices" name="dices" value="5">
<input type="hidden" id="roll" name="roll" value="{{ $roll + 1 }}">

@if ($roll < 1)
<button name="rolldices" type="submit" value="rolldices">Roll dices</button>

@elseif ($roll < 3)
<button name="rolldices" type="submit" value="rolldices">Reroll/Save</button>

@elseif ($roll == 3)
<button name="rolldices" type="submit" value="rolldices">Save</button>
@endif
</div>

</form>
