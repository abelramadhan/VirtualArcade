<?php
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>VIRTUAL ARCADE</title>
</head>
<body>
    <div class="navbar">
        <a href="/home"><h2 class="logo">VIRTUAL<br>ARCADE</h2></a>
        <div class="nav-list">
            <span class="nav-item" onclick="currentSlide(1)"><img class="menu-icon" src="{{ asset('images/icons/home.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(2)"><img class="menu-icon" src="{{ asset('images/icons/game.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(3)"><img class="menu-icon" src="{{ asset('images/icons/leaderboard.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(4)"><img class="menu-icon" src="{{ asset('images/icons/info.svg') }}" alt="home"></span>
        </div>
        <div class="profile">
            <div   div class="user">
                <h3 class="signed-in">signed in as</h3>
                <h3 class="username">{{ $username }}</h3>
            </div>
            <div class="logout">
                <img onclick="show()" class="logout-icon" src="{{ asset('images/icons/logout.svg') }}">
                <div id="dropdown" class="logout-dropdown">
                    <h3>Log out of this account?</h3>
                    <div>
                        <a href="/logout" id="logout-btn">Logout</a>
                        <a id="cancel-btn">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-container">

        <div class="slide fade">
        <div class="hero">
            <div class="hero-title">
                <H1>GET THE<br>HIGHEST<br>SCORE</H1>
                <p>Compete with your friends in playing arcade games
                    and get the highest score in the leaderboards
                </p>
                <div class="buttons">
                    <h1 onclick="currentSlide(2)">PLAY ></h1>
                    <h2 onclick="currentSlide(3)">View Leaderboard</h2>
                </div>
            </div>
            <img class="hero-img" src="{{ asset('images/akiaki3.png') }}" alt="">
        </div>
        </div>

        <div class="slide fade">
            <div class="games">
                <h1>GAMES</h1>
                <a href="./games/snek"><div class="game-container">
                    <h2>SNEK</h2>
                </div></a>
                <a href="./games/tetris"><div class="game-container">
                    <h2>TETRIS</h2>
                </div></a>
                <a href="./games/spaceinvader"><div class="game-container">
                    <h2>SPACE INVADERS</h2>
                </div></a>
                <a href="./games/sudoku"><div class="game-container">
                    <h2>SUDOKU</h2>
                </div></a>
            </div>
        </div>

        <div class="slide fade">
            <div class="leaderboard">
                <div class="leaderboard-title">
                    <h1>LEADERBOARDS</h1>
                    <h3>{{ $game }}</h3>
                </div>
                <div class="leaderboard-select">
                    <form method="get" action="{{ route('get_leaderboard') }}">
                        <select id="game-lead" name="game-lead" onchange="this.form.submit()">
                            <option selected hidden>select game</option>
                            <option value="sneks">snek</option>
                            <option value="tetris">tetris</option>
                            <option value="space_invaders">space invader</option>
                            <option value="sudokus">sudoku</option>
                        </select>
                    </form>
                </div>
                <div class="leaderboard-container">
                    <table>
                        <thead>
                        <tr class="header-row">
                            <td>#</td>
                            <td>username</td>
                            <td>highscore</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($leaderboard as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->username }}</td>
                            <td class="highscore">{{ $row->highscore }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="slide fade">
            <div class="info">
                <h1>INFO</h1>
            </div>
        </div>

    </div>
    <div class="footer">
        <h3>| VirtualArcade is a project made by some student of Brawijaya University as a final project in Web Programming | 
            virtualarcade@gmail.com | +62 111234578 |
        </h3>
        <div class="socialmedia">
            <a href="" class="fa fa-instagram"></a>
            <a href="" class="fa fa-twitter"></a>
            <a href="" class="fa fa-facebook"></a>
        </div>
    </div>

    <script>
        // Navigation
        var menu = {{ $menu }};
        var slideIndex = menu;
        showSlides(slideIndex);
        
        function currentSlide(n) {
            showSlides(slideIndex = n);
            var nextURL;
            switch (n) {
                case 1: nextURL = '/home'; break;
                case 2: nextURL = '/games'; break;
                case 3: nextURL = '/leaderboardAV'; break;
                case 4: nextURL = '/info'; break;
            }
            const nextTitle = 'VIRTUAL ARCADE';
            const nextState = { additionalInformation: 'Updated' };
            window.history.pushState(nextState, nextTitle, nextURL);
        }
        
        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("slide");
          var icon = document.getElementsByClassName("nav-item");
          if (n > slides.length) {slideIndex = 1}    
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";  
          }
          for (i = 0; i < icon.length; i++) {
              icon[i].className = icon[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "flex";  
          icon[slideIndex-1].className += " active";
        }


         // Logout
        function show() {
            document.getElementById("dropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.logout-icon')) {
                var dropdowns = document.getElementsByClassName("logout-dropdown");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

</body>
</html>