<!DOCTYPE html>
<html>
    <head>
        <title>Space Invaders</title>
        <link rel="stylesheet" type="text/css" href="css/core.css">
        <link rel="stylesheet" type="text/css" href="css/typeography.css">
        <style>
    
            /* Styling needed for a fullscreen canvas and no scrollbars. */
            body, html { 
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            }

            #starfield {
                width:100%;
                height:100%;
                z-index: -1;
                position: absolute;
                left: 0px;
                top: 0px;
            }
            #gamecontainer {
                width: 800px;
                margin-left: auto;
                margin-right: auto;
            }
            #gamecanvas { 
                width: 800px;
                height: 600px;
            }
            #info {
                width: 800px;
                margin-left: auto;
                margin-right: auto;
            }
        </style>
    </head>
    <body>
        <div id="starfield"></div>
        <div id="gamecontainer">
        <canvas id="gameCanvas"></canvas>
        </div>
        <div id="info">
            <p>Move with arrow keys or swipe, fire with the space bar or touch. The invaders get faster and drop
                more bombs as you complete each level!</p>
            <p><a id="muteLink" href="#" onclick="toggleMute()">mute</a> | 
                <a href="http://github.com/dwmkerr/spaceinvaders">spaceinvaders on github</a> | 
                <a href="http://github.com/dwmkerr">more projects</a> | <a href="http://www.dwmkerr.com">dwmkerr.com</a></p>
        </div>

        <script src="js/starfield.js"></script>
        <script src="js/spaceinvaders.js"></script>
        <script>

            //  Create the starfield.
            var container = document.getElementById('starfield');
            var starfield = new Starfield();
            starfield.initialise(container);
            starfield.start();

            //  Setup the canvas.
            var canvas = document.getElementById("gameCanvas");
            canvas.width = 800;
            canvas.height = 600;

            //  Create the game.
            var game = new Game();

            //  Initialise it with the game canvas.
            game.initialise(canvas);

            //  Start the game.
            game.start();

            //  Listen for keyboard events.
            window.addEventListener("keydown", function keydown(e) {
                var keycode = e.which || window.event.keycode;
                //  Supress further processing of left/right/space (37/29/32)
                if(keycode == 37 || keycode == 39 || keycode == 32) {
                    e.preventDefault();
                }
                game.keyDown(keycode);

            });
            window.addEventListener("keyup", function keydown(e) {
                var keycode = e.which || window.event.keycode;
                game.keyUp(keycode);
            });

            window.addEventListener("touchstart", function (e) {
                game.touchstart(e);
            }, false);
 
            window.addEventListener('touchend', function(e){
                game.touchend(e);
            }, false);

            window.addEventListener('touchmove', function(e){
                game.touchmove(e);
            }, false);

            function toggleMute() {
                game.mute();
                document.getElementById("muteLink").innerText = game.sounds.mute ? "unmute" : "mute";
            }
        </script>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-41728580-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </body>
</html>
