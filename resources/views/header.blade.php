<?php

$favicon = url("/../resources/img/favicon.ico");
$style = url("/../resources/css/style.css");

$home = url('/');
$session = url('/session');
$test = url('/test');
$yatzy = url("/yatzy/home");
$highscore = url("/yatzy/highscore");
$statistics = url("/yatzy/statistics");
$book = url('/books');

?>

<!doctype html>
<html>
    <meta charset="utf-8">
    <title>{{ $title ?? "No title" }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ $favicon }}">
    <link rel="stylesheet" type="text/css" href="{{ $style }}">
</head>

<body>

<header>
    <nav>
        <a class="active" href="{{ $home }}">Home</a>
        <a href="{{ $session }}">Session</a>
        <a href="{{ $test }}">Test</a>
        <a href="{{ $yatzy }}">Yatzy</a>
        <a href="{{ $highscore }}">High Score</a>
        <a href="{{ $statistics }}">Statistics</a>
        <a href="{{ $book }}">Books</a>
    </nav>
</header>
<main>
