<html>

<head>
    <link href="../styles/game.css" type="text/css" rel="stylesheet">
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/clickAndDrop.js"></script>

    <title>Quarto</title>

    <?php 
        session_start();
        if(isset($_SESSION["nickname"])) {
            $nickname1 = $_SESSION["nickname"][1];
            $nickname2 = $_SESSION["nickname"][2];
        } else{
            $nickname1 = $_POST["nickname1"];
            $nickname2 = $_POST["nickname2"];

            $_SESSION["nickname"] = array(1 => $nickname1, 2=> $nickname2);
        }
    ?>

</head>

<body>
    <header>
        <br>
        <h1>QUARTO</h1>
    </header>

    <div id="titleMargin" style="margin-top: 20px;"></div>
    <div style="text-align:center;">
        Choose the piece that your opponent should move.
    </div>
    <div id="titleMargin" style="margin-top: 20px;"></div>

    <div id="playerNames" style="height: 60px; margin: auto; width: 100%; text-align:center">
        <span id="player1" style="display:inline-block;" class="playerSelected"> <?php echo "$nickname1" ?> </span>
        <span id="player2" style="display:inline-block;" class="playerNotSelected"> <?php echo "$nickname2" ?>
        </span>
    </div>

    <div style="width:100%; margin:auto; text-align:center">
        <div style="width:15%; display:inline-block">
            <table class="board">
                <tr>
                    <!-- id de la forma "big filled blue circle" -->
                    <td id="bfbc"> <img style="width:90px" src="../Images/blueCircle.png" alt="big filled blue circle">
                    </td>
                    <td id="bhbc"> <img style="width:90px" src="../Images/blueCircleHoled.png"
                            alt="big holed blue circle"> </td>
                </tr>
                <tr>
                    <td id="sfbc"> <img style="width:40px" src="../Images/blueCircle.png"
                            alt="small filled blue circle"> </td>
                    <td id="shbc"> <img style="width:40px" src="../Images/blueCircleHoled.png"
                            alt="small holed blue circle"> </td>
                </tr>
                <tr>
                    <td id="bfbs"> <img style="width:90px" src="../Images/blueSquare.png" alt="big filled blue square">
                    </td>
                    <td id="bhbs"> <img style="width:90px" src="../Images/blueSquareHoled.png"
                            alt="big holed blue square"> </td>
                </tr>
                <tr>
                    <td id="sfbs"> <img style="width:40px" src="../Images/blueSquare.png"
                            alt="small filled blue square"> </td>
                    <td id="shbs"> <img style="width:40px" src="../Images/blueSquareHoled.png"
                            alt="small holed blue square"> </td>
                </tr>
            </table>
        </div>
        <div style="width:55%; display:inline-block">
            <table class="board">
                <tr>
                    <td id="1-1"></td>
                    <td id="1-2"></td>
                    <td id="1-3"></td>
                    <td id="1-4"></td>
                </tr>
                <tr>
                    <td id="2-1"></td>
                    <td id="2-2"></td>
                    <td id="2-3"></td>
                    <td id="2-4"></td>
                </tr>
                <tr>
                    <td id="3-1"></td>
                    <td id="3-2"></td>
                    <td id="3-3"></td>
                    <td id="3-4"></td>
                </tr>
                <tr>
                    <td id="4-1"></td>
                    <td id="4-2"></td>
                    <td id="4-3"></td>
                    <td id="4-4"></td>
                </tr>
            </table>
        </div>
        <div style="width:15%; display:inline-block">
            <table class="board">
                <tr>
                    <td id="bfyc"> <img style="width:90px" src="../Images/yellowCircle.png"
                            alt="big filled yellow circle"> </td>
                    <td id="bhyc"> <img style="width:90px" src="../Images/yellowCircleHoled.png"
                            alt="big holed yellow circle"> </td>
                </tr>
                <tr>
                    <td id="sfyc"> <img style="width:40px" src="../Images/yellowCircle.png"
                            alt="small filled yellow circle"> </td>
                    <td id="shyc"> <img style="width:40px" src="../Images/yellowCircleHoled.png"
                            alt="small holed yellow circle"> </td>
                </tr>
                <tr>
                    <td id="bfys"> <img style="width:90px" src="../Images/yellowSquare.jpg"
                            alt="big filled yellow square"> </td>
                    <td id="bhys"> <img style="width:90px" src="../Images/yellowSquareHoled.jpg"
                            alt="big holed yellow square"> </td>
                </tr>
                <tr>
                    <td id="sfys"> <img style="width:40px" src="../Images/yellowSquare.jpg"
                            alt="small filled yellow square"> </td>
                    <td id="shys"> <img style="width:40px" src="../Images/yellowSquareHoled.jpg"
                            alt="small holed yellow square"> </td>
                </tr>
            </table>
        </div>
    </div>