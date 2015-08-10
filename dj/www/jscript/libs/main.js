var decoder = $('#qrcanvass'),
    pr = $('.glyphicon-print'),
    sl = $('.scanner-laser'),
    pl = $('#play'),
    si = $('#scanned-img'),
    sQ = $('#scanned-QR'),
    sv = $('#save'),
    sp = $('#stop'),
    co = $('#contrast'),
    cov = $('#contrast-value'),
    zo = $('#zoom'),
    zov = $('#zoom-value'),
    br = $('#brightness'),
    brv = $('#brightness-value'),
    tr = $('#threshold')
    trv = $('#threshold-value'),
    sh = $('#sharpness'),
    shv = $('#sharpness-value'),
    gr = $('#grayscale'),
    grv = $('#grayscale-value');
pr.parent().click(function() {
    printDiv('.img-thumbnail');
});
sl.css('opacity', .5);
pl.click(function() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") {
        decoder.WebCodeCam({
            videoSource: {
                id: $('select#cameraId').val(),
                maxWidth: 640,
                maxHeight: 480
            },
            autoBrightnessValue: 100,
            resultFunction: function(text, imgSrc) {
                si.attr('src', imgSrc);
                sQ.text(text);
                sl.fadeOut(150, function() {
                    sl.fadeIn(150);
                });
            }
        });
        sQ.text('Scanning ...');
        sv.removeClass('disabled');
        sp.click(function(event) {
            sv.addClass('disabled');
            sQ.text('Stopped');
            decoder.data().plugin_WebCodeCam.cameraStop();
        });
    } else {
        sv.removeClass('disabled');
        sQ.text('Scanning ...');
        decoder.data().plugin_WebCodeCam.cameraPlay();
    }
});
sv.click(function() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var src = decoder.data().plugin_WebCodeCam.getLastImageSrc();
    si.attr('src', src);
});

function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    var dataURL = canvas.toDataURL("image/png");
    return dataURL;
}

function changeZoom(a) {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = typeof a != 'undefined' ? parseFloat(a.toPrecision(2)) : zo.val() / 10;
    zov.text(zov.text().split(':')[0] + ': ' + value.toString());
    decoder.data().plugin_WebCodeCam.options.zoom = parseFloat(value);
    if (typeof a != 'undefined') zo.val(a * 10);
}

function changeContrast() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = co.val();
    cov.text(cov.text().split(':')[0] + ': ' + value.toString());
    decoder.data().plugin_WebCodeCam.options.contrast = parseFloat(value);
}

function changeBrightness() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = br.val();
    brv.text(brv.text().split(':')[0] + ': ' + value.toString());
    decoder.data().plugin_WebCodeCam.options.brightness = parseFloat(value);
}

function changeThreshold() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = tr.val();
    trv.text(trv.text().split(':')[0] + ': ' + value.toString());
    decoder.data().plugin_WebCodeCam.options.threshold = parseFloat(value);
}

function changeSharpness() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = sh.prop('checked');
    if (value) {
        shv.text(shv.text().split(':')[0] + ': on');
        decoder.data().plugin_WebCodeCam.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
    } else {
        shv.text(shv.text().split(':')[0] + ': off');
        decoder.data().plugin_WebCodeCam.options.sharpness = [];
    }
}

function changeGrayscale() {
    if (typeof decoder.data().plugin_WebCodeCam == "undefined") return;
    var value = gr.prop('checked');
    if (value) {
        grv.text(grv.text().split(':')[0] + ': on');
        decoder.data().plugin_WebCodeCam.options.grayScale = true;
    } else {
        grv.text(grv.text().split(':')[0] + ': off');
        decoder.data().plugin_WebCodeCam.options.grayScale = false;
    }
}
var getZomm = setInterval(function() {
    var a;
    try {
        a = decoder.data().plugin_WebCodeCam.optimalZoom();
    } catch (e) {
        a = 0;
    }
    if (a != 0) {
        changeZoom(a);
        clearInterval(getZomm);
    }
}, 500);

function gotSources(sourceInfos) {
    for (var i = 0; i !== sourceInfos.length; ++i) {
        var sourceInfo = sourceInfos[i];
        var option = document.createElement('option');
        var videoSelect = document.querySelector('select#cameraId');
        option.value = sourceInfo.id;
        if (sourceInfo.kind === 'video') {
            var face = sourceInfo.facing == '' ? 'unknown' : sourceInfo.facing;
            option.text = sourceInfo.label || 'camera ' + (videoSelect.length + 1) + ' (facing: ' + face + ')';
            videoSelect.appendChild(option);
        }
    }
}
if (typeof MediaStreamTrack.getSources !== 'undefined') {
    var videoSelect = document.querySelector('select#cameraId');
    $(videoSelect).change(function(event) {
        if (typeof decoder.data().plugin_WebCodeCam !== "undefined") {
            decoder.data().plugin_WebCodeCam.options.videoSource.id = $(this).val();
            decoder.data().plugin_WebCodeCam.cameraStop();
            decoder.data().plugin_WebCodeCam.init();
            decoder.data().plugin_WebCodeCam.cameraPlay();
        }
    });
    MediaStreamTrack.getSources(gotSources);
    pl.click();
} else {
    document.querySelector('select#cameraId').remove();
}
