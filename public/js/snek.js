const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");

const box = 20;

let snek = [];
snek[0] = {
    x : 5*box,
    y : 5*box
};

let food = {
    x : Math.floor(Math.random()*18+1)*box,
    y : Math.floor(Math.random()*18+1)*box
}

let score = 0;

let d;
document.addEventListener("keydown",direction);
function direction(event) {
    let key = event.keyCode;
    if (key == 37 && d != "right") {
        d = "left";
    } else if (key==38 && d != "down") {
        d = "up";
    } else if (key==39 && d != "left") {
        d = "right";
    } else if (key==40 && d != "up") {
        d = "down";
    } 
}

function directionbtn(dirkey) {
    if (dirkey==1 && d != "down") {
        d = "up";
    } else if (dirkey==2 && d != "right") {
        d = "left";
    } else if (dirkey==3 && d != "up") {
        d = "down";
    } else if (dirkey==4 && d != "left") {
        d = "right";
    } 
}


function draw() {
   
    ctx.fillStyle = "#1f1f1f";
    ctx.fillRect(0,0,400,400);
    
    for (let i=0; i<snek.length; i++) {
        ctx.fillStyle = "white";
        ctx.fillRect(snek[i].x,snek[i].y,box,box);

        ctx.strokeStyle = "#1f1f1f";
        ctx.strokeRect(snek[i].x,snek[i].y,box,box);
    }
    ctx.fillStyle = "#1f1f1f";
    ctx.fillRect(food.x,food.y,box,box);
    ctx.strokeStyle = "white";
    ctx.strokeRect(food.x,food.y,box,box);

    let snekX = snek[0].x;
    let snekY = snek[0].y;

    if (d=="up") snekY -= box; 
    if (d=="down") snekY += box; 
    if (d=="left") snekX -= box; 
    if (d=="right") snekX += box; 

    if (snekX==food.x&&snekY==food.y) {
        score+=100;
        food = {
            x : Math.floor(Math.random()*18+1)*box,
            y : Math.floor(Math.random()*18+1)*box
        }
    } else {
        snek.pop();
    }

    let newHead = {
        x : snekX,
        y : snekY
    }
    
    if (snekX<0||snekX>19*box||snekY<0||snekY>19*box||collision(newHead,snek)) {
        clearInterval(game);
        document.getElementById("score").innerHTML = "GAME OVER <br> score : "+score;
        document.getElementById("restartbtn").style.visibility = "visible";
    } else {
        document.getElementById("score").innerHTML = score;
    }
    
    snek.unshift(newHead);
    console.log(snek.length);
    
}

let game = setInterval(draw, 100);

function collision(head,array) {
    for (let i=0; i<array.length; i++) {
        if (head.x==array[i].x && head.y==array[i].y) {
            return true;
        }
    }
    return false;
}