//Cache a reference to the html element



//mouse-draw Funktion für Schlagempfehlungen ***WIP***
var canvas,
    ctx,
    dragging = false,
    dragStartLocation,
    snapshot,
    clearCanvas,
    pic = new Image(),
    coordinates =[
        {x: 156,y:187},
        {x: 454,y:73},
        {x: 454,y:73},
        {x: 661,y:139},
    ],
    bahnNamen = [
        "Freischlag",
        "Brücke",
        "Direktschlag",
        "Doppelwelle",
        "Hügel",
        "Labyrinth",
        "Liegende Schleife",
        "Netz",
        "Passagen",
        "Pramiden",
        "Salto",
        "Sandschlüssel",
        "Springer",
        "Tunnel",
        "Vulkan",
        "Wahlschlag",
        "Winkel",
        "NULL",
    ],
    bahnNummer = null;


function bahn($bahntyp){
    bahnNummer = $bahntyp;
    drawLineCoordinates();
    pic.src = "images/minigolfbahnen/bahn"+$bahntyp+".jpg";
    pic.addEventListener("load", function () {ctx.drawImage(pic, 0, 0)}, false);
    document.getElementById("bahn-title").innerHTML = bahnNamen[$bahntyp-1];
    document.getElementById("bahn-title").style.backgroundColor = "#474747";
}

    //clear Canvas + set background again
    function clearCan(){
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        pic.src = "images/minigolfbahnen/bahn"+bahnNummer+".jpg";
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
    coordinates.push(dragStartLocation);
    console.log(coordinates);
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
    coordinates.push(position);
    console.log(coordinates);
    drawLine(position);
}

/*
*   Koordinaten in Array speichern
*
*/
function drawLineCoordinates() {
    if (coordinates.length >= 1){
        for (var i = 0; i < coordinates.length; i++) {
            if(i != coordinates.length-1) {
                ctx.beginPath();
                ctx.moveTo(coordinates[i].x, coordinates[i].y);
                ctx.lineTo(coordinates[i + 1].x, coordinates[i + 1].y);
                ctx.stroke();
            }
        }
    }
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


//Image responsive anpassen
/*
pic.onload = function(){
    canvas.width = pic.naturalWidth;
    canvas.height = pic.naturalHeight;
    ctx.drawImage(pic, 0, 0);
    }
    */

$(document).ready(function () {

    /*
     *   Exportiert Canvas in den Image-Ordner
     */
    document.querySelector('#export').onclick = function () {
        var canvas = document.getElementById("canvas");
        var dataURL = canvas.toDataURL("image/png");
        document.getElementById('hidden_data').value = dataURL;
        var fd = new FormData(document.forms["form1"]);
        fd.append('bahn', bahnNummer);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'saveCanvasDataUrl.php', true);

        xhr.upload.onprogress = function(e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                console.log(percentComplete + '% uploaded');
                swal({
                    title: 'Bist du sicher?',
                    text: "Die Schlagempfehlung kann nicht mehr bearbeitet werden!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ja, hochladen!',
                    cancelButtonText: 'Nein, abbrechen!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                    swal(
                        'Hochgeladen!',
                        'Die Schlagempfehlung wurde hochgeladen.',
                        'success'
                    )
                }, function (dismiss) {
                    // dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                    if (dismiss === 'cancel') {
                        swal(
                            'Abgebrochen',
                            'Du kannst weiterarbeiten :)',
                            'error'
                        )
                    }
                })

            }
        };


        xhr.onload = function() {

        };
        xhr.send(fd);


    };

    $(".dropdown-menu a li").click(function(){
        $(this).parents(".dropdown").find('.btn').html($(this).text() + '&nbsp&nbsp<i class="fa fa-plus-square" aria-hidden="true"></i>');
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
    });

});