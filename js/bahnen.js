/**
 * Created by Lukas on 04.09.2017.
 */

//Cache a reference to the html element
var canvas = document.getElementById('canvas');

canvas.width = canvas.scrollWidth;
canvas.height=canvas.scrollHeight;
var ctx=canvas.getContext('2d');

var clicks = 0;
var lastClick = [0, 0];

document.getElementById('canvas').addEventListener('click', drawLine, false);

function getCursorPosition(e) {
    var x;
    var y;

    if (e.pageX != undefined && e.pageY != undefined) {
        x = event.pageX + canvas.offsetLeft,
        y = event.pageY + canvas.offsetTop;
    } else {
        x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
        y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    return [x, y];
}

function drawLine(e) {
    context = this.getContext('2d');

    x = getCursorPosition(e)[0] - this.offsetLeft;
    y = getCursorPosition(e)[1] - this.offsetTop;

    if (clicks != 1) {
        clicks++;
    } else {
        context.beginPath();
        context.moveTo(lastClick[0], lastClick[1]);
        context.lineTo(x, y, 6);

        context.strokeStyle = '#000000';
        context.stroke();

        clicks = 0;
    }

    lastClick = [x, y];
};