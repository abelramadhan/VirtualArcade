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
            <a class="nav-item" href=""><img class="menu-icon" src="{{ asset('icons/home.svg') }}" alt="home"></a>
            <a class="nav-item" href=""><img class="menu-icon" src="{{ asset('icons/game.svg') }}" alt="home"></a>
            <a class="nav-item" href=""><img class="menu-icon" src="{{ asset('icons/leaderboard.svg') }}" alt="home"></a>
            <a class="nav-item" href=""><img class="menu-icon" src="{{ asset('icons/info.svg') }}" alt="home"></a>
        </div>
        <div class="profile">
            <div   div class="user">
                <h3 class="signed-in">signed in as</h3>
                <h3 class="username">Kemal003</h3>
            </div>
            <img class="profile-icon" src="{{ asset('icons/profile_icon.svg') }}" alt="">
        </div>
    </div>
    <div class="home">
        <div class="hero">
            <div class="hero-title">
                <H1>GET THE<br>HIGHEST<br>SCORE</H1>
                <p>Compete with your friends in playing arcade games
                    and get the highest score in the leaderboards
                </p>
                <div class="buttons">
                    <h1>PLAY ></h1>
                    <h2>View Leaderboard</h2>
                </div>
            </div>
            <img class="hero-img" src="{{ asset('icons/akiaki3.png') }}" alt="">
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
</body>
</html>