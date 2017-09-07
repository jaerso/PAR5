//Cache a reference to the html element



//mouse-draw Funktion für Schlagempfehlungen ***WIP***
var canvas,
    ctx,
    dragging = false,
    dragStartLocation,
    snapshot,
    clearCanvas;

    //clear Canvas + set background again
    function clearCan(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    var pic = new Image();
    pic.src = "images/minigolfbahnen/bahn1.jpg";
    pic.addEventListener("load", function () {ctx.drawImage(pic, 0, 0)}, false);
}

function getCanvasCoordinates(event) {
    var x = event.clientX - canvas.getBoundingClientRect().left,
        y = event.clientY - canvas.getBoundingClientRect().top;

    return {
        x: x,
        y: y
    };
}

function takeSnapshot() {
    snapshot = ctx.getImageData(0, 0, canvas.width, canvas.height);
}

function restoreSnapshot() {
    ctx.putImageData(snapshot, 0, 0);
}


function drawLine(position) {
    ctx.beginPath();
    ctx.moveTo(dragStartLocation.x, dragStartLocation.y);
    ctx.lineTo(position.x, position.y);
    ctx.stroke();
}

function dragStart(event) {
    dragging = true;
    dragStartLocation = getCanvasCoordinates(event);
    takeSnapshot();
}

function drag(event) {
    var position;
    if (dragging === true) {
        restoreSnapshot();
        position = getCanvasCoordinates(event);
        drawLine(position);
    }
}

function dragStop(event) {
    dragging = false;
    restoreSnapshot();
    var position = getCanvasCoordinates(event);
    drawLine(position);
}



function init() {
    canvas = document.getElementById("canvas");
    clearCanvas = document.getElementById('clearCanvas'),
    canvas.width = canvas.scrollWidth;
    canvas.height = canvas.scrollHeight;
    ctx = canvas.getContext('2d');

    ctx.strokeStyle = 'yellow';
    ctx.lineWidth = 6;
    ctx.lineCap = 'round';

    canvas.addEventListener('mousedown', dragStart, false);
    canvas.addEventListener('mousemove', drag, false);
    canvas.addEventListener('mouseup', dragStop, false);
    clearCanvas.addEventListener('click', clearCan, false);
    
}
window.addEventListener('load', init, false);
//mouse-draw Funktion ENDE

var pic = new Image();

function bahn($bahntyp){
    pic.src = "images/minigolfbahnen/bahn"+$bahntyp+".jpg";
    pic.addEventListener("load", function () {ctx.drawImage(pic, 0, 0)}, false);
    
}
/*
pic.onload = function(){
    canvas.width = pic.naturalWidth;
    canvas.height = pic.naturalHeight;
    ctx.drawImage(pic, 0, 0);
    }
    */