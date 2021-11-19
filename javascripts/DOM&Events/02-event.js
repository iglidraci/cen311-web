'use strict';

const h2 = document.querySelector('h2');

// the problem with this is that every time we hover it's going to alert
h2.addEventListener(
    'mouseenter', (event) => {
        console.log(event);
        alert('Tada!!!');
    }
);
// or 
// h2.onmouseenter = function

h2.addEventListener('mouseleave', _ => alert('Ya left'));

h2.addEventListener('mouseleave', _ => console.log('ya left'));


// let's alert only once

const alertFunc = () => {
    alert('Tadaaa!');
    // you can remove it directly
    // h3.removeEventListener('mouseover', alertFunc);
};

const h3 = document.querySelector('h3');

h3.addEventListener('mouseover', alertFunc);

// or remove it after some time
setTimeout(() => h3.removeEventListener('mouseover', alertFunc), 5000);

// captering phase and bubbling phase

// event propagation
const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
};

const randomColor = () =>  randomIntBetween(0, 255);

const randomRgb = () => `rgb(${randomColor()}, ${randomColor()}, ${randomColor()})`;

const active = document.querySelector('.active');

active.addEventListener('click', (event) => {
    active.style.backgroundColor = randomRgb();
    console.log('Anchor tag, target',  event.target);
    console.log('Current target', event.currentTarget);
    // event.stopPropagation();
});

// lets do the same for the paretn and see what happens

const section = document.querySelector('section');

section.addEventListener('click', (event) => {
    section.style.backgroundColor = randomRgb();
    // the target element will always be the same
    console.log('section tag, target', event.target);
    console.log('Current target', event.currentTarget);
});

// we can stop the event propagation if we call event.stopPropagation()

// addEventListener default listens during the bubbling phase not during capturing
// if you pass true as the third arg of addEventListener then it will listen
// for events during the capturing phase
