<html>

<head>
    <link href="../styles/index.css" type="text/css" rel="stylesheet">
    <title>Quarto</title>
</head>

<body>

    <header>
        <br>
        <h1>QUARTO</h1>
    </header>

    <?php 
        session_start();
        if(isset($_SESSION["gameCode"])) {
            $gameCode = $_SESSION["gameCode"];
        } else {
            $gameCode = $_GET["gameCode"];
            $_SESSION["gameCode"] = $gameCode;
        }
    ?>

    <div id="titleMargin" style="margin-top: 60px;"></div>

    Game Code: <?php echo $gameCode ?><br>
    Insert your nickname:<br>
    <form action="../views/game.php" method="POST">
        <input type="text" required="false" name="gameCode" value="<?php echo $gameCode ?>" style="display:none;">
        <input type="text" required="true" name="nickname1"><br>
        <input type="text" required="true" name="nickname2">
        <button type="submit" style="margin-left: 30px"> ► </button>
    </form>
</body>

</html>