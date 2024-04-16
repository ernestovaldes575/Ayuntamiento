const button = document.querySelector('.button');
const nav = document.querySelector('.nav');

const btnGray = document.querySelector('.btn-gray');
const btnInvert = document.querySelector('.btn-invert');

const body = document.querySelector('body');


button.addEventListener('click', desplegable);
btnGray.addEventListener('click', changeGray);
btnInvert.addEventListener('click', changeInvert);


function desplegable(){
    nav.classList.toggle('activo');
}
function changeGray(){
    body.classList.toggle('bg-gray')
}
function changeInvert(){
    body.classList.toggle('bg-invert')
}


function aumentarTexto() {
    var elementosEnlace = document.querySelectorAll("p, a, h2");
    for (var i = 0; i < elementosEnlace.length; i++) {
        var estilo = window.getComputedStyle(elementosEnlace[i], null).getPropertyValue('font-size');
        var fontSize = parseFloat(estilo); 
        elementosEnlace[i].style.fontSize = (fontSize + 2) + 'px';
    }
}

function disminuirTexto() {
    var elementosEnlace = document.querySelectorAll("p, a, h2");
    for (var i = 0; i < elementosEnlace.length; i++) {
        var estilo = window.getComputedStyle(elementosEnlace[i], null).getPropertyValue('font-size');
        var fontSize = parseFloat(estilo); 
        elementosEnlace[i].style.fontSize = (fontSize - 2) + 'px';
    }
}

console.log('Prueba');