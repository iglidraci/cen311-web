'use strict';

/**
 * event types
 * onchange, onclick, onmouseover, onmouseout, onkeydown, onload
 */

console.log(document.querySelector('.message').textContent);

document.querySelector('.message').innerHTML = "<h2>Hello JS</h2>";
console.log(document.querySelector('.message'));

document.querySelector('.check').addEventListener('click',
    () => {
        document.querySelector('.new-text').textContent = 'New text added';
        document.querySelector('.change-color').style.color = 'red';
        document.querySelector('.change-color').style.fontSize = '40px';
        console.log(Math.trunc(Math.random() * 20) + 1);
    });
const modalButtons = document.querySelectorAll('.modal-btn');
modalButtons.forEach(x => {
    x.addEventListener(
        'click', () => {
            document.querySelector('.modal').classList.remove('hidden');
        }
    )
});

document.querySelector('.close-btn').addEventListener(
    'click', () => {
        document.querySelector('.modal').classList.add('hidden');
    }
);

document.addEventListener('keydown', event => {
    if (event.key == 'Escape') {
        document.querySelector('.modal').classList.add('hidden');
    }
});

