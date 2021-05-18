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
        <h2 class="logo">VIRTUAL<br>ARCADE</h2>
        <div class="nav-list">
            <span class="nav-item" onclick="currentSlide(1)"><img class="menu-icon" src="{{ asset('images/icons/home.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(2)"><img class="menu-icon" src="{{ asset('images/icons/game.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(3)"><img class="menu-icon" src="{{ asset('images/icons/leaderboard.svg') }}" alt="home"></span>
            <span class="nav-item" onclick="currentSlide(4)"><img class="menu-icon" src="{{ asset('images/icons/info.svg') }}" alt="home"></span>
        </div>
        <div class="profile">
            <div   div class="user">
                <h3 class="signed-in">signed in as</h3>
                <h3 class="username">Kemal003</h3>
            </div>
            <img class="profile-icon" src="{{ asset('images/icons/profile_icon.svg') }}" alt="">
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
                <a href="./snek"><div class="game-container">
                    <h2>SNEK</h2>
                </div></a>
                <a href="./tetris"><div class="game-container">
                    <h2>TETRIS</h2>
                </div></a>
                <a href="./pong"><div class="game-container">
                    <h2>PONG</h2>
                </div></a>
                <a href="./spaceinvader"><div class="game-container">
                    <h2>SPACE INVADERS</h2>
                </div></a>
                <a href="./sudoku"><div class="game-container">
                    <h2>SUDOKU</h2>
                </div></a>
            </div>
        </div>

        <div class="slide fade">
            <div class="leaderboard">
                <h1>LEADERBOARDS</h1>
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
        var slideIndex = 1;
        showSlides(slideIndex);
        
        function currentSlide(n) {
          showSlides(slideIndex = n);
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
    </script>

</body>
</html>