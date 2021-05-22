<?php

$home = url("/home");
$addHighscore = url("/highscore/add");


$header = $header ?? null;
$totalScore = $totalScore ?? null;
$rounds = $rounds ?? null;

$newHighscore = $newHighscore ?? null;

?>
<div class="container">
<div class="yatzy-div">
<div class="text">

<h1>{{ $header }}</h1>

@if ($newHighscore == true)
<p>Congratulations! You scored a new high score!</p>

<form class="highscore-form" method="POST" action="{{ $addHighscore }}">
@csrf
<input type="hidden" id="score" name="score" value="{{ $totalScore }}">
<label for="name">Name:</label>
  <input type="text" id="name" name="name" placeholder="Your name" maxlength="20" required><br>
<button class="roll" name="addScore" type="submit">Add to High Score</button>

</form>
@endif

<p>
<button class="play">
    <a class="play" href="{{ $home }}">Play again?</a>
</button>
</p>
</div>

<table>
    <tr>
        <th>Scorebox</th>
        <th> </th>
    </tr>
    @foreach ($rounds as $r => $r_value)
    <tr>
        <td>{{ $r }}</td>
        <td>{{ $r_value }}</td>
    </tr>
    @endforeach
</table>
</div>
</div>



