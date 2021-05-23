<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TETRIS</title>
    <link rel="stylesheet" href="{{ asset('css/balok.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
</head>
<body>
    <div class="back-button">
        <a href="/games">
            <h3>< back</h3>
        </a>
    </div>
    <div class="judul-game">
        <h1>TETRIS</h1>
        <h3 class="highscore">current highscore : {{ $currentHighscore }}</h3>
    </div>
    <div id="gameover" >
        <h1>GAME OVER</h1>
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
        <button onclick="play()" id='restartbtn' class="play-button">PLAY</button>
        <script src="{{ asset('js/balok/board.js') }}"></script>
        <script src="{{ asset('js/balok/constants.js') }}"></script>
        <script src="{{ asset('js/balok/main.js') }}"></script>
        <script src="{{ asset('js/balok/piece.js') }}"></script>
    </div>
    </div>
    <form id="senderForm" method="post" action=" {{ route('submit.tetris') }} ">
        @csrf
        <input id="scoreSend" type="hidden" name="score" value=" ">
    </form>
</body>
</html>