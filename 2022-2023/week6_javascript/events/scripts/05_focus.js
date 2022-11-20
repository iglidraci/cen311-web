'use strict';

const infoDiv = document.querySelector('#info');

const inputs = document.querySelectorAll('input');

for(let input of inputs) {
    input.addEventListener('focus', event => {
        infoDiv.innerHTML = `<p style="color: green">${event.target.getAttribute('data-help')}</p>`;
    });
    input.addEventListener('blur', () => {
        infoDiv.textContent = '';
    });
}

