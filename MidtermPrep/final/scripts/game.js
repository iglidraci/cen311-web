'use strict';

const nr1 = +prompt('First fibonacci number?');
const nr2 = +prompt('Second fibonacci number?');

// const nr1 = 1;
// const nr2 = 1;

const infoDiv = document.querySelector('.info');

infoDiv.innerHTML = `<h1>Welcome to fibonacci game</h1><h1>You chose ${nr1}, ${nr2}
                        as your initial values</h1>`;

const btn = document.querySelector('#go-button');
const input = document.querySelector('#fib-input');
const resultDiv = document.querySelector('.result-div');

btn.addEventListener('click', () => {
    const nr = +input.value;
    const sequence = [nr1, nr2];
    let prev1 = nr1;
    let prev2 = nr2;
    let current;
    let count = 3;
    while (count <= nr) {
        current = prev1 + prev2;
        sequence.push(current);
        prev1 = prev2;
        prev2 = current;
        count++;
    }
    const result = sequence.join(', ');
    resultDiv.textContent = result;
})