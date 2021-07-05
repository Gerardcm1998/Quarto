<html>
<head>
    <?php session_start(); ?>
    <link href="styles/index.css" type="text/css" rel="stylesheet">
    <title>Quarto</title>
</head>
<body>

<header>
    <br>
    <h1>QUARTO</h1>
</header>

<div id="titleMargin" style="margin-top: 60px;">
    <div style="margin:auto; text-align:center;">
        <a href="./views/insertName.php?gameCode=<?php echo random_int(0,10000)?>">New Game</a> <br>
        <form action="views/insertName.php" method="GET">
            Join Game:
            <input type="text" required="true" name="gameCode" style="margin-left: 20px;"/>
            <button type="submit" style="margin-left: 30px"> ► </button>
        </form>
    </div>
</div>

</body>
</html>