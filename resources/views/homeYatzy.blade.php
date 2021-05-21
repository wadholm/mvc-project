<?php

$destroy = url("/destroy");
$play = url("/play");
$image = url("/../resources/img/dices.jpg");

$numberOfDices = 5;

?>
<div class="index">
<h1>{{ $header }}</h1>

<img class="img" src="{{ $image }}" alt="dices">

<p>{{ $message }}</p>
<p>{{ $instructions }}</p>

<form method="POST" action="{{ $play }}">
@csrf
<input type="hidden" id="start" name="start" value="start">
<input type="hidden" id="dices" name="dices" value="{{ $numberOfDices }}">
<button name="start" type="submit">Start game</button>

</form>

<p>
<button class="reset">
    <a class="reset" href="{{ $destroy }}">Reset score</a>
</button>
</p>
</div>
