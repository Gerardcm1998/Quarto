<html>

<head>
    <?php 
        session_start();
        session_reset();
        $step2 = isset($_GET["gameCode"]);
        $displayStep2 = $step2 ? "block" : "none";
        $displayStep1 = $step2 ? "none" : "block";
    ?>
    <link href="styles/index.css" type="text/css" rel="stylesheet">
    <script src="./js/jquery-3.5.0.min.js"></script>
    <script src="./js/jquery-ui.min.js"></script>
    <title>Quarto</title>

    <script>
        $(document).ready(function() {
            sessionStorage.clear();
        })
    </script>
    
</head>

<body>
    <header>
        <br>
        <h1>QUARTO</h1>
    </header>

    <a href="index.php" style="display:<?php echo $displayStep2 ?>;">
        < Back </a>
            <div id="titleMargin" style="margin-top: 60px;">
                <div style="margin:auto; text-align:center;display:<?php echo $displayStep1 ?>;">
                    <a href="index.php?gameCode=<?php echo random_int(0,10000) ?>">New Game</a> <br>
                    <form action="index.php" method="get">
                        Join Game:
                        <input type="text" required="true" name="gameCode" style="margin-left: 20px;" />
                        <button type="submit" style="margin-left: 30px" onclick=""> ► </button>
                    </form>
                </div>
            </div>

            <div style="display:<?php echo $displayStep2 ?>; margin:auto; text-align:center; width:75%">
                Game Code: <?php echo $_GET["gameCode"] ?> <br><br>

                <form action="./game.php" method="POST">
                    <input type="text" required="false" name="gameCode" value="<?php echo $gameCode ?>"
                        style="display:none;">
                    <div style="width:15%; display:inline-block; text-align:right;">
                        Insert your nickname:
                    </div>
                    <div style="width:20%; display:inline-block">
                        <input type="text" required="true" name="nickname1"><br>
                        <input type="text" required="true" name="nickname2">
                    </div>
                    <div style="width:15%; display:inline-block; text-align:left;">
                        <button type="submit" style="margin-left: 30px"> ► </button>
                    </div>

                </form>
            </div>

</body>

</html>