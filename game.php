<html>

<head>
    <link href="./styles/game.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery-3.5.0.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <script src="./js/game.js"></script>

    <title>Quarto</title>

    <?php 
        session_start();
        session_reset();
            if (isset($_POST["nickname1"]) && isset($_POST["nickname2"])) {
                $nickname1 = $_POST["nickname1"];
                $nickname2 = $_POST["nickname2"];
                $_SESSION["nickname"] = array(1 => $nickname1, 2=> $nickname2);
            } else {
                $nickname1 = $_SESSION["nickname"][1];
                $nickname2 = $_SESSION["nickname"][2];
            }
    ?>

    <script>
    $(document).ready(function() {
        var nickname = new Array(<?php echo "'$nickname1', '$nickname2'"?>);
        sessionStorage.setItem("nicknames", JSON.stringify(nickname));
        var points = JSON.parse(sessionStorage.getItem("points"));
        if(points == null) {
            points = new Array(0, 0);
            sessionStorage.setItem("points", JSON.stringify(points));
        }
    });

    function goToStartPage() {
        if (confirm('Are you sure you want to turn back to the start page? This will restart your game.')) {
            window.location = 'index.php';
        }
    }
    </script>

</head>

<body>
    <header>
        <br>
        <h1 onclick="goToStartPage()"> QUARTO</h1>
    </header>

    <div id="titleMargin" style="margin-top: 20px;"></div>
    <div style="text-align:center;">
        <label id="infoText">Choose the piece that your opponent should move.</label>
    </div>
    <div id="titleMargin" style="margin-top: 20px;"></div>

    <div id="playerNames" style="height: 60px; margin: auto; width: 100%; text-align:center">
        <span id="player1" style="display:inline-block;" class="playerSelected"> <?php echo "$nickname1" ?> </span>
        <span id="player2" style="display:inline-block;" class="playerNotSelected"> <?php echo "$nickname2" ?>
        </span>
    </div>

    <!-- id de la forma "big filled blue circle" -->
    <div style="width:100%; margin:auto; text-align:center">
        <div style="width:15%; display:inline-block">
            <table class="board">
                <tr>
                    <td id="bfbc" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/blueCircle.png" alt="big filled blue circle" name="bfbc">
                    </td>
                    <td id="bhbc" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/blueCircleHoled.png" alt="big holed blue circle"
                            name="bhbc">
                    </td>
                </tr>
                <tr>
                    <td id="sfbc" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/blueCircle.png" alt="small filled blue circle"
                            name="sfbc">
                    </td>
                    <td id="shbc" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/blueCircleHoled.png" alt="small holed blue circle"
                            name="shbc">
                    </td>
                </tr>
                <tr>
                    <td id="bfbs" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/blueSquare.png" alt="big filled blue square" name="bfbs">
                    </td>
                    <td id="bhbs" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/blueSquareHoled.png" alt="big holed blue square"
                            name="bhbs">
                    </td>
                </tr>
                <tr>
                    <td id="sfbs" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/blueSquare.png" alt="small filled blue square"
                            name="sfbs">
                    </td>
                    <td id="shbs" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/blueSquareHoled.png" alt="small holed blue square"
                            name="shbs">
                    </td>
                </tr>
            </table>
        </div>
        <div style="width:55%; display:inline-block">
            <table id="panel" class="board">
                <tr>
                    <td id="1-1" onclick="placePiece(this)"></td>
                    <td id="1-2" onclick="placePiece(this)"></td>
                    <td id="1-3" onclick="placePiece(this)"></td>
                    <td id="1-4" onclick="placePiece(this)"></td>
                </tr>
                <tr>
                    <td id="2-1" onclick="placePiece(this)"></td>
                    <td id="2-2" onclick="placePiece(this)"></td>
                    <td id="2-3" onclick="placePiece(this)"></td>
                    <td id="2-4" onclick="placePiece(this)"></td>
                </tr>
                <tr>
                    <td id="3-1" onclick="placePiece(this)"></td>
                    <td id="3-2" onclick="placePiece(this)"></td>
                    <td id="3-3" onclick="placePiece(this)"></td>
                    <td id="3-4" onclick="placePiece(this)"></td>
                </tr>
                <tr>
                    <td id="4-1" onclick="placePiece(this)"></td>
                    <td id="4-2" onclick="placePiece(this)"></td>
                    <td id="4-3" onclick="placePiece(this)"></td>
                    <td id="4-4" onclick="placePiece(this)"></td>
                </tr>
            </table>
        </div>
        <div style="width:15%; display:inline-block">
            <table class="board">
                <tr>
                    <td id="bfyc" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/yellowCircle.png" alt="big filled yellow circle"
                            name="bfyc">
                    </td>
                    <td id="bhyc" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/yellowCircleHoled.png" alt="big holed yellow circle"
                            name="bhyc">
                    </td>
                </tr>
                <tr>
                    <td id="sfyc" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/yellowCircle.png" alt="small filled yellow circle"
                            name="sfyc">
                    </td>
                    <td id="shyc" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/yellowCircleHoled.png" alt="small holed yellow circle"
                            name="shyc">
                    </td>
                </tr>
                <tr>
                    <td id="bfys" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/yellowSquare.jpg" alt="big filled yellow square"
                            name="bfys">
                    </td>
                    <td id="bhys" onclick="choosePiece(this)">
                        <img style="width:90px" src="./Images/yellowSquareHoled.png" alt="big holed yellow square"
                            name="bhys">
                    </td>
                </tr>
                <tr>
                    <td id="sfys" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/yellowSquare.jpg" alt="small filled yellow square"
                            name="sfys">
                    </td>
                    <td id="shys" onclick="choosePiece(this)">
                        <img style="width:40px" src="./Images/yellowSquareHoled.png" alt="small holed yellow square"
                            name="shys">
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>