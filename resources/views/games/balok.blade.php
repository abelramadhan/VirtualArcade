<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balok</title>
    <link rel="stylesheet" href="{{ asset('css/balok.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
</head>
<body>
    <div>
        <h1>BALOK</h1>
    </div>
    <div class="grid">
    <canvas id="board" class="game-board"></canvas>
    <div class="right-column">
        <div>
        <p>Score: <span id="score">0</span></p>
        <p>Lines: <span id="lines">0</span></p>
        <p>Level: <span id="level">0</span></p>
        <canvas id="next" class="next"></canvas>
        </div>
        <button onclick="play()" class="play-button">Play</button>
        <button onclick="play()" class="play-button">Play</button>
        <script src="{{ asset('js/balok/board.js') }}"></script>
        <script src="{{ asset('js/balok/constants.js') }}"></script>
        <script src="{{ asset('js/balok/main.js') }}"></script>
        <script src="{{ asset('js/balok/piece.js') }}"></script>
    </div>
    </div>
</body>
</html>