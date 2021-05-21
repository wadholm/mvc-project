<?php

$favicon = url("/../resources/img/favicon.ico");
$style = url("/../resources/css/style.css");

$home = url('/');
$highscore = url("/highscore");
$statistics = url("/statistics");

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
        <a class="active" href="{{ $home }}">Yatzy</a>
        <a href="{{ $highscore }}">High Score</a>
        <a href="{{ $statistics }}">Statistics</a>
    </nav>
</header>
<main>
