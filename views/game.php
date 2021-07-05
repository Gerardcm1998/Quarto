<html>
<head>
    <link href="../styles/game.css" type="text/css" rel="stylesheet">
    <title>Quarto</title>

    <?php 
        if (isset($_SESSION["nickname1"])) {
            $nickname1 = $_SESSION["nickname1"];
        } else{
            $nickname1 = $_POST["nickname"];
            $_SESSION["nickname1"] = $nickname1;
        }
        $nickname2 = "nn2";
    ?>

</head>
<body>
<header>
    <br>
    <h1>QUARTO</h1>
</header>

<div id="titleMargin" style="margin-top: 60px;">

<div id="playerNames" style="height: 60px; margin: auto; width: 100%; text-align:center">
    <span id="player1" style="display:inline-block;" class="playerNotSelected"> <?php echo "$nickname1" ?> </span>
    <span id="player2" style="display:inline-block;" class="playerNotSelected"> <?php echo "$nickname2" ?> </span>
</div>

<div style="width:100%; margin:auto; text-align:center" >
    <div style="width:15%; display:inline-block" >
        <table class="board">
            <tr>
                <td> <img style="width:90px" src="../Images/blueCircle.png" alt="blue circle big filled"> </td>
                <td> <img style="width:90px" src="../Images/blueCircleHoled.png" alt="blue circle big holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:40px" src="../Images/blueCircle.png" alt="blue circle small filled"> </td>
                <td> <img style="width:40px" src="../Images/blueCircleHoled.png" alt="blue circle small holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:90px" src="../Images/blueSquare.png" alt="blue square big filled"> </td>
                <td> <img style="width:90px" src="../Images/blueSquareHoled.png" alt="blue square big holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:40px" src="../Images/blueSquare.png" alt="blue square small filled"> </td>
                <td> <img style="width:40px" src="../Images/blueSquareHoled.png" alt="blue square small holed"> </td>
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
                <td> <img style="width:90px" src="../Images/yellowCircle.png" alt="yellow circle big filled"> </td>
                <td> <img style="width:90px" src="../Images/yellowCircleHoled.png" alt="yellow circle big holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:40px" src="../Images/yellowCircle.png" alt="yellow circle small filled"> </td>
                <td> <img style="width:40px" src="../Images/yellowCircleHoled.png" alt="yellow circle small holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:90px" src="../Images/yellowSquare.jpg" alt="yellow square big filled"> </td>
                <td> <img style="width:90px" src="../Images/yellowSquareHoled.jpg" alt="yellow square big holed"> </td>
            </tr>
            <tr>
                <td> <img style="width:40px" src="../Images/yellowSquare.jpg" alt="yellow square small filled"> </td>
                <td> <img style="width:40px" src="../Images/yellowSquareHoled.jpg" alt="yellow square small holed"> </td>
            </tr>
        </table>
    </div>