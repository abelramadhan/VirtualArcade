<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snek</title>
    <link rel="stylesheet" href="{{ asset('css/snek.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <h1>SNEK</h1>
        <div id="score">0</div>
    </div>
    <canvas id="canvas" width="400px" height="400px"></canvas>
    <div class="control">
        <button class="ctrlbtn" id="up" onclick="directionbtn(1)">▲</button>
        <div class="downsec">
        <button class="ctrlbtn" id="left" onclick="directionbtn(2)">◄</button>
        <button class="ctrlbtn" id="down" onclick="directionbtn(3)">▼</button>
        <button class="ctrlbtn" id="right" onclick="directionbtn(4)">►</button>
        </div>
    </div>
    <button id="restartbtn" onclick="location.reload()">RESTART</button>
    <script src="{{ asset('js/snek.js') }}"></script>
</body>
</html>