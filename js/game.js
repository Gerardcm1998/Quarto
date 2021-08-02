var timeToChoose = true;
var pieceToBePlaced = null;
var placedPieces = [];

/**
 * Function to change the turn of the players once the player finished its own turn
 */
function changeTurn() {
    if ($("#player1").prop("class") == "playerSelected") {
        $("#player1").prop("class", "playerNotSelected");
        $("#player2").prop("class", "playerSelected");
    } else {
        $("#player1").prop("class", "playerSelected");
        $("#player2").prop("class", "playerNotSelected");
    }
}

/**
 * Function that change the style of the piece container to remark which piece is being placed
 * @param {Place that will be remarked} td 
 * @param {boolean to indicate if it is going to remark or unmark} remark 
 */
function markActualPiece(td, remark) {
    if (remark) {
        $(td).addClass("marked");
    } else {
        $(td).removeClass("marked");
    }
}

/**
 * Function that tells if the place row-col is in some diagonal
 * @param {row} row 
 * @param {col} col 
 * @returns boolean 
 */
function haveDiagonals(row, col) {
    return row == col || row + col == 5;
}

/**
 * This function returns true if the four pieces have a common caracteristic.
 * @param {Array of four pieces} pieces 
 */
function haveSomethingInCommon(pieces) {
    var car1 = [];
    var car2 = [];
    var car3 = [];
    var car4 = [];

    for (i = 0; i < 4; ++i) {
        car1.push(pieces[i][0]);
        car2.push(pieces[i][1]);
        car3.push(pieces[i][2]);
        car4.push(pieces[i][3]);
    }

    if (car1.every((element) => element == car1[0]) ||
        car2.every((element) => element == car2[0]) ||
        car3.every((element) => element == car3[0]) ||
        car4.every((element) => element == car4[0])) {
        return true;
    }
    return false;
}

/**
 * If there is a fulfilled thing, it returns an array with it, and an empty array otherwise.
 * @param {number of row. Value 0 if there is no row} row 
 * @param {number of col. Value 0 if there is no col} col 
 * @param {number of diag. Value 0 if there is no diag} diag 
 * @returns 
 */
function win(row, col, diag) {

    // If there was a fulfilled row...
    if (row > 0) {
        var sameRow = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[0] == row);
        var pieces = [];
        sameRow.forEach(element => {
            pieces.push(element[1]);
        });
        console.log(JSON.stringify(pieces));

        if (haveSomethingInCommon(pieces)) {
            return ["row", row];
        }
    }

    // If there was a fulfilled column...
    if (col > 0) {
        var sameCol = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[1] == col);
        var pieces = [];
        sameCol.forEach(element => {
            pieces.push(element[1]);
        });
        console.log(JSON.stringify(pieces));

        if (haveSomethingInCommon(pieces)) {
            return ["col", col];
        }
    }

    if (diag > 0) {

        if (diag == 1) {
            var sameDiag = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[0] == placedPiece[0].split('-')[1]);
        } else if (diag == 2) {
            var sameDiag = placedPieces.filter((placedPiece) => parseInt(placedPiece[0].split('-')[0]) + parseInt(placedPiece[0].split('-')[1]) == 5);
        }

        var pieces = [];
        sameDiag.forEach(element => {
            pieces.push(element[1]);
        });
        console.log(JSON.stringify(pieces));

        if (haveSomethingInCommon(pieces)) {
            return ["diag", diag];
        }
    }
    return [];
}

/**
 * Function that let you know if you have just aligned four pieces, 
 * and returns an array where there is the common characteristic.
 * Empty array otherwise.
 * @param {Placed where was placed the last piece} place 
 */
function fourPiecesAligned() {

    // Take the position of the last positioned piece
    var lastPosition = placedPieces[placedPieces.length - 1][0];
    var lastPositionRow = parseInt(lastPosition.split("-")[0]);
    var lastPositionCol = parseInt(lastPosition.split("-")[1]);

    // See if it has fulfilled a whole row, column and/or diagonal
    var sameRow = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[0] == lastPositionRow);
    var fullRow = sameRow.length == 4;

    var sameCol = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[1] == lastPositionCol);
    var fullCol = sameCol.length == 4;

    var sameDiag = [];
    if (haveDiagonals(lastPositionRow, lastPositionCol)) { // If there are diagonals to comprove
        if (lastPositionRow == lastPositionCol) {
            sameDiag = placedPieces.filter((placedPiece) => placedPiece[0].split('-')[0] == placedPiece[0].split('-')[1]);
        } else {
            sameDiag = placedPieces.filter((placedPiece) => parseInt(placedPiece[0].split('-')[0]) + parseInt(placedPiece[0].split('-')[1]) == 5);
        }
    }
    var fullDiag = sameDiag.length == 4;

    // Let's see if the wholed sets have some property in common
    var proveRow = fullRow ? lastPositionRow : 0;
    var proveCol = fullCol ? lastPositionCol : 0;
    var proveDiag = 0;
    if (fullDiag && sameDiag.length == 4) {
        proveDiag = lastPositionRow == lastPositionCol ? 1 : 2;
    }

    return win(proveRow, proveCol, proveDiag);
}

/**
 * This function will run when clicking the where the piece will be placed
 * @param {Where to place the piece. Given from the html by clicking} place 
 */
function placePiece(place) {
    // Wrong click
    if (timeToChoose || pieceToBePlaced == null) {
        alert("This is not what have to be done now. You have to choose a piece.");
        return;
    }

    var originTd = pieceToBePlaced.parentNode;

    // If there is already a piece in this position...
    if ($(place).children().length > 0) {
        $("#infoText").text("You should place the piece somewhere else, not being occupated");
        return;
    }
    place.append(pieceToBePlaced);

    //Stores the new placed piece into the array of placed pieces
    let newPiece = [place.id, pieceToBePlaced.name];
    placedPieces.push(newPiece);

    // If four pieces are aligned with success, you have win
    var victoryArray = fourPiecesAligned();
    if (victoryArray.length != 0) {
        sessionStorage.setItem("winner",$(".playerSelected").html());
        sessionStorage.setItem("victory", JSON.stringify(victoryArray));
        sessionStorage.setItem("board", $("#panel").html());
        window.location = "victory.php";
    }

    // If there is no victory, prepare the next turn
    $("#infoText").text(`Choose the piece that your opponent should move.`);
    markActualPiece(originTd, remark = false);
    timeToChoose = true;
    pieceToBePlaced = null;
}

/**
 * This function will run when a player click the piece that the opponent must place.
 * @param {td: Container of the image} td 
 */
function choosePiece(td) {
    if (!timeToChoose) {
        alert("This is not what have to be done now. You have to choose a place.");
        return;
    }

    pieceToBePlaced = td.firstElementChild;

    // If the piece has not been moved yet:
    if (pieceToBePlaced != null) {
        changeTurn();
        markActualPiece(td, remark = true);
        $("#infoText").html(`Place the <b>${pieceToBePlaced.alt}</b> piece where you want`);
        timeToChoose = false;

        // If the piece has been placed before:
    } else {
        $("#infoText").text("You should click a piece that still remains on its place");
    }

}

