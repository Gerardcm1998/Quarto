<html>

<head>
    <link href="./styles/game.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery-3.5.0.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>

    <title>Quarto</title>
    <script>
        $(document).ready(function() {
           $(".board").html(sessionStorage.getItem("board"));
           $("#winner").html(sessionStorage.getItem("winner"));
           var victoryArray = JSON.parse(sessionStorage.getItem("victory"));
           console.log(victoryArray);
           switch(victoryArray[0]) {
                case "row": 
                    for (let j=1;j<=4;++j) {
                        $(`#${victoryArray[1]}-${j}`).addClass("marked");
                    }
                    break;
                case "col":
                    for (let i=1;i<=4;++i) {
                        $(`#${i}-${victoryArray[1]}`).addClass("marked");
                    }
                    break;
                case "diag":
                    for (let i=1;i<=4;++i) {
                        if (victoryArray[1] == 1) {
                            $(`#${i}-${i}`).addClass("marked");
                        } else if (victoryArray[1] == 2) {
                            $(`#${i}-${5-i}`).addClass("marked");
                        } else {
                            alert("Something went wrong...")
                        }
                    }
                    break;
                default:
                    alert("something went wrong...")
           }
        });
    </script>

</head>

<body>
    <header>
        <br>
        <h1> QUARTO</h1>
    </header>

    <div id="titleMargin" style="margin-top: 20px;"></div>
    <div id="playerNames" style="height: 60px; margin: auto; width: 100%; text-align:center">
    Winner: 
        <span id="winner" style="display:inline-block;" class="playerSelected">  </span>
        </span>
    </div>
    <div style="width:100%; margin:auto; text-align:center">
        <div style="width:55%; display:inline-block">
            <table class="board">
                
            </table>
        </div>
    </div>

</body>

</html>