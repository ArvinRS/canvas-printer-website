'use strict';

var FileReader = window.FileReader || window.MozFileReader || window.webkitFileReader;
var preview = document.querySelector('#previewImg');
var file = document.querySelector('input[type=file]').files[0];
var reader = new FileReader();

reader.onloadend = function () {
    preview.src = reader.result;
};

if (file) {
    reader.readAsDataURL(file);
} else {
    preview.src = "";
}