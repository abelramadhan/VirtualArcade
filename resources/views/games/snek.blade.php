<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNEK</title>
    <link rel="stylesheet" href="{{ asset('css/snek.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div class="back-button">
        <a href="/games">
            <h3>< back</h3>
        </a>
    </div>
    <div class="title">
        <h1>SNEK</h1>
        <div id="score">0</div>
        <h3 class="highscore">current highscore : {{ $currentHighscore }}</h3>
    </div>
    <form id="senderForm" method="post" action=" {{ route('submit.snek') }} ">
        @csrf
        <input id="scoreSend" type="hidden" name="score" value=" ">
    </form>
    <canvas id="canvas" width="400px" height="400px"></canvas>
    <button id="restartbtn" onclick="submitScore()">SAVE & RESTART</button>
    <script src="{{ asset('js/snek.js') }}"></script>
</body>
</html>