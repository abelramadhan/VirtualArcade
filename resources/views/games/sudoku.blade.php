<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudoku</title>
    <link rel="stylesheet" href="{{ asset('css/SudokuStyle/Style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body class="flex-col">
    <div class="back-button">
        <a href="/games">
            <h3>< back</h3>
        </a>
    </div>
    <div id="main__container">
        <div id="header__controls" class="flex-row">
            <span id="header__menu"><img src="{{ asset('images/SudokuImage/option.png') }}" id="dotMenuSpan"></span>
            <Span id="header__header">SUDOKU</Span>
            <span id="header__submit"><span>Submit</span ></span>
        </div>
        <div id="dotMenu">
            <div id="back" class="flex-row" style="justify-content: space-evenly;"><img src="{{ asset('images/SudokuImage/home.svg') }}" alt=""> Home</div>
            <div id="newGame">New Game</div>
            <div id="clear">Clear All</div>
            <div id="solver"> <span id="text"></span>
                <div id="solverMenu">
                    <div id="solverStart">Start</div>
                    <div id="solverWatch"> 
                        <input type="checkbox" id="solverWatchCbox" name="solverWatchCbox" value="watch" checked>
                        <label for="solverWatchCbox">Watch</label>
                    </div>
                    <div id="solverSpeed">
                        <label for="speedRange">Speed</label>
                        <input type="range" name="speedRange" id="speedRange" max="250" min="50" value="100">
                    </div>
                    <div id="solverStop">Stop</div>
                </div>

            </div>
        </div>
        
        <!-- board -->
        <div id="board">

        </div>
        <div id="keypad" class="flex-row">
        </div>

    </div>

    <!-- home page with menu options -->
    <div id="home">
        <div id="header">
            <div id="title">SUDOKU</div>
            <div style="font-size: 15px; margin-top: 10px;" class="highscore">current highscore : {{ $currentHighscore }}</div>

            <div id="selection__size" class="selection flex-row">
                <span class="title">Size</span>
                <div class="options flex-row">
                    <span data-size="4"><svg width="24" height="24" viewBox="0 0 1792 1792"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path
                                d="M832 1024v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm0-768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm896 768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90zm0-768v384q0 52-38 90t-90 38h-512q-52 0-90-38t-38-90v-384q0-52 38-90t90-38h512q52 0 90 38t38 90z" />
                            </svg></span>
                    <span data-size="9"><svg width="24" height="24" viewBox="0 0 1792 1792"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path
                                d="M512 1248v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm-640-1024v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm-640-1024v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm640 512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-320q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h320q40 0 68 28t28 68z" />
                            </svg></span>
                </div>
            </div>

            <div id="selection__level" class="selection flex-row">
                <span class="title">Level</span>
                <div class="options">
                    <Span data-level=0>Easy</Span>
                    <Span data-level=1>Maybe</Span>
                    <Span data-level=2>Evil</Span>
                </div>
            </div>
            <div onclick="showbtn()" id="start">Start</div>
        </div>
    </div>

    <div onclick="submitScore()" class="save-btn">
        <h1 id="save_exit">SAVE & EXIT</h1>
    </div>

    <form id="senderForm" method="post" action=" {{ route('submit.sudoku') }} ">
        @csrf
        <input id="scoreSend" type="hidden" name="score" value=" ">
    </form>

    <script src="{{ asset('js/SudokuScript/global.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/combinations.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/validate.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/board.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/view.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/digger.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/userActions.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/solver.js') }}"></script>
    <script src="{{ asset('js/SudokuScript/script.js') }}"></script>
    <script>
        function showbtn() {
            document.getElementById("save_exit").style.display = "block";
        }
    </script>
</body>

</html>
