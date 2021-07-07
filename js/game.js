var timeToChoose = true;
var pieceToBePlaced = null;

/**
 * Function to change the turn of the players once the player finished its own turn
 */
function changeTurn() {
    if ($("#player1").prop("class") == "playerSelected") {
        $("#player1").prop("class","playerNotSelected");
        $("#player2").prop("class","playerSelected");
    } else {
        $("#player1").prop("class","playerSelected");
        $("#player2").prop("class","playerNotSelected");
    }
}

/**
 * Function that change the style of the piece container to remark which piece must be placed
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
 * This funtion will run when clicking the panel, where the piece will be placed
 * @param {Where to place the piece. Given from the html by clicking} place 
 */
function placePiece(place) {
    if (timeToChoose || pieceToBePlaced == null) {
        alert("This is not what have to be done now");
        return;
    }
    var td = pieceToBePlaced.parentNode;
    // If there is already a piece in this position...
    if ($(place).children().length > 0) {
        $("#infoText").text("You should place the piece somewhere else, not being occupated");
        return;
    }
    place.append(pieceToBePlaced);
    $("#infoText").text(`Choose the piece that your opponent should move.`);
    markActualPiece(td, remark=false);
    timeToChoose = true;
    pieceToBePlaced = null;
}

/**
 * Function that make everything when the player click the piece that the opponent must place.
 * @param {Object of the clicked td} td 
 */
function choosePiece(td) {
    if (!timeToChoose) {
        alert("This is not what have to be done now");
        return;
    }
    pieceToBePlaced = td.firstElementChild;
    // If the piece has not been moved yet:
    if (pieceToBePlaced != null) {
        changeTurn();
        markActualPiece(td, remark=true);
        $("#infoText").html(`Place the <b>${pieceToBePlaced.alt}</b> piece where you want`);
        timeToChoose = false;

        // If the piece has been placed before:
    } else {
        $("#infoText").text("You should click a piece that still remains on its place");
    }
    
}

