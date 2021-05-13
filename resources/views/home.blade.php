<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,700&display=swap" rel="stylesheet">
    <title>VIRTUAL ARCADE</title>
</head>
<body>
    <div class="navbar">
        <h2 class="logo">VIRTUAL<br>ARCADE</h2>
        <div class="end">
        <div class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="">Games</a></li>
                <li class="nav-item"><a href="">Leaderboard</a></li>
                <li class="nav-item"><a href="">News</a></li>
                <li class="nav-item"><a href="">About Us</a></li>
            </ul>
        </div>
        <div class="profile">
            <div class="user">
                <h3 class="signed-in">signed in as</h3>
                <h3 class="username">Kemal003</h3>
            </div>
            <img class="profile-icon" src="{{ asset('icons/profile_icon.svg') }}" alt="">
        </div>
        </div>
    </div>
</body>
</html>