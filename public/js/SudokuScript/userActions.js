let isFirstTime = true;
let isFirstTime_dotMenu = true;
let emptyItems;
let keyPadItems;
let user__level = [level, 'Evil'];
let user__size = boardSize;
var score = 0;

function initActions() {

    if (isFirstTime) {
        let submitButton = document.querySelector('#header__submit > span')
        let body = document.querySelector('body')
        let startButton = document.querySelector('#start')
        let home__options = document.querySelectorAll('.selection .options span')

        submitButton.addEventListener('click', submitHandler)
        body.addEventListener('keyup', keyUpHandler)
        startButton.addEventListener('click', startHandler)
        home__options.forEach(x => x.addEventListener('click', homeOptionsHandler))

        isFirstTime = false;
    }

    let selection;

    function emptyItemHandler() {
        emptyItems.forEach(x => x.classList.remove('selected'))
        this.classList.add('selected')
    }

    function keyPadHandler(event) {
        event.stopPropagation()
        if (selection = document.querySelector('.selected')) {
            selection.textContent = this.textContent;
            let x = selection.id[0];
            let y = selection.id[1];
            board.board[x][y] = this.textContent == "" ? 0 : parseInt(this.textContent)
        }
    }
    //Scoring after sumbit and refresh to the new game
    let point = 0;
    
    function upgradePoint(){
        if(user__size  == 4){
            if (user__level[0] == 0){
                if (score >= 500){
                    point = 120
                }else if(score >= 1500){
                    point = 150
                }else{
                    point = 100
                }
            }else if(user__level[0] == 1){
                if(score >= 3500){
                    point = 200
                }if(score >= 5000){
                    point = 220
                }else{
                    point = 180
                }
            }else{
                if(score >= 7500){
                    point = 250
                }else if(score >= 9500){
                    point = 280
                }else if(score >= 11500){
                    point = 300
                }else{
                    point = 220
                }
            }
        }else if (user__size == 9){
            if (user__level[0] == 0){
                if (score < 500){
                    point = 150
                }else if (score < 1500){
                    point = 180
                }else{
                    point = 120
                }
            }else if (user__level[0] == 1){
                if(score >= 3500){
                    point = 200
                }else if(score >= 5000){
                    point = 220
                }else{
                    point = 180
                }
            }else{
                if(score >= 7500){
                    point = 280
                }else if(score >= 9500){
                    point = 300
                }else if(score >= 11500){
                    point = 320
                }else{
                    point = 250
                }
            }
            
        }       
    }

    function upgradeLevel(){
        if(user__level[0] == 0){
            if(score >= 2500){
                user__level[0] = 1
            }else{
                user__level[0] = 0
            }
        }else if (user__level[0] = 1){
            if (score >= 6500){
                user__level[0] = 2
            }else{
                user__level[0] = 2
            }
        }
    }

    function submitHandler(event) {
        event.stopPropagation();
        let validater = new Validate(board.board, boardSize)
        let isValid = validater.runTests();
        if (isValid) {
            upgradeLevel()
            upgradePoint()
            score = score+point
            alert("Yeay! Kamu berhasil menyelesiakan game. Skor kamu sekarang "+ score + " poin!")
            startHandler()
        } else {
            alert("Coba lagi ya, masih ada yang salah!")
        }
    }

    function dotMenuHandler(e) {
        e.stopPropagation()
        dotMenuDiv = document.querySelector('#dotMenu')
        dotMenuDiv.classList.add('d-block')

        if (isFirstTime_dotMenu) {
            isFirstTime_dotMenu = false;

            //solver handlers
            solverStartButton.addEventListener('click', () => solverStartHandler())
            speedRangeButton.addEventListener('click', (event) => speedRangeHandler(event))
            solverStopButton.addEventListener('click', ()=> {
                dotMenuDiv.classList.remove('d-block');
                solver.requestStop = true;
            })

            //page reloadon clear ALl
            document.querySelector('#back').addEventListener('click', (event) => {
                event.stopPropagation()
                window.location.reload()
            })

            //clear user input
            document.querySelector('#clear').addEventListener('click', (event) => {
                event.stopPropagation()
                clearUserInput()
                dotMenuDiv.classList.remove('d-block')
            })

            //load new game, with same user inputs
            document.querySelector('#newGame').addEventListener('click', (event) => {
                event.stopPropagation()
                dotMenuDiv.classList.remove('d-block')
                startHandler()
            })

            document.querySelector('#solver').addEventListener('click', (event) => {
                event.stopPropagation()                
                solverMenu.classList.toggle('d-block')
            })
            
            //hide menu when clicking on div
            document.querySelector('body').addEventListener('click', () => {                
                dotMenuDiv.classList.remove('d-block')
                solverMenu.classList.remove('d-block')
            })
        }

    }

    function keyUpHandler(event) {
        if (selection = document.querySelector('.selected')) {
            let k = event.keyCode;
            if (((k < 46 || k > 57) && (k < 96 || k > 105)) || k == 47) {
                //not a number        
            } else {
                selection.textContent = event.keyCode == 46 ? "" : event.key;
                let x = selection.id[0];
                let y = selection.id[1];
                board.board[x][y] = event.keyCode == 46 ? 0 : parseInt(event.key)
            }
        }

    }

    //starts here: after user clicks on start game button
    function startHandler() {
        let home = document.querySelector('#home')
        let main__container = document.querySelector('#main__container')
        home.style.display = "none";
        main__container.style.display = "block";
        newGame(user__size, user__level[0])
        declareBoardElements()
    }

    function homeOptionsHandler(event) {
        event.stopPropagation()
        let remaining = this.parentNode;
        remaining = remaining.querySelectorAll('span');
        if (this.parentNode.parentNode.id == "selection__level") {
            remaining.forEach(x => {
                x.style.background = "none"
                x.style.color = "black"
            })
            this.style.color = "white";
            this.style.background = "#0097e6";
            user__level[0] = parseInt(this.dataset["level"])
            user__level[1] = this.textContent;

        } else if (this.parentNode.parentNode.id == "selection__size") {
            remaining.forEach(x => x.style.color = "black")
            this.style.color = "#0097e6";
            user__size = parseInt(this.dataset["size"])
        }
    }

    function solverStartHandler() {     
        dotMenuDiv.classList.remove('d-block')   
        solver = new Solver(board.board)
        solver.watch = solverWatchButton.checked;
        solver.requestStop = false;
        solver.speed = 250 - parseInt(speedRangeButton.value) + 50;
        solver.startSolving()
    }

    function speedRangeHandler(event){
        event.stopPropagation();
        
    }

    function declareBoardElements() {
        emptyItems = document.querySelectorAll('.emptyItem')
        keyPadItems = document.querySelectorAll('.keypad__item')
        dotMenuButton = document.querySelector('#dotMenuSpan')
        solverMenu = document.querySelector('#solverMenu')
        solverStartButton = document.querySelector('#solverStart')
        solverWatchButton = document.querySelector('#solverWatchCbox')
        solverStopButton = document.querySelector('#solverStop')
        speedRangeButton = document.querySelector('#speedRange')

        emptyItems.forEach(x => x.addEventListener('click', emptyItemHandler))
        keyPadItems.forEach(x => x.addEventListener('click', keyPadHandler))
        dotMenuButton.addEventListener('click', (e) => dotMenuHandler(e))        
    }
}

function submitScore() {
    document.getElementById("scoreSend").value = score;
    document.getElementById("senderForm").submit();
}

