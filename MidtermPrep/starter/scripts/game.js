'use strict';

const nr1 = 1;
const nr2 = 1;

const infoDiv = document.querySelector('.info');

infoDiv.innerHTML = `<h1>Welcome to fibonacci game</h1><h1>You chose ${nr1}, ${nr2}
                        as your initial values</h1>`;

const btn = document.querySelector('#go-button');
const input = document.querySelector('#fib-input');
const resultDiv = document.querySelector('.result-div');

btn.addEventListener('click', () => {
    // get the input value
    // generate fibonnacci sequence (imperative or recursively )
    // join the list of numbers by ',' and print it on html page
})