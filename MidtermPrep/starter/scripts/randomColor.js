'use strict';

console.log('1' + 1);
console.log('2' - 1);
console.log('1' + (-1));

const container = document.querySelector('.container');
const allDivs = [...container.querySelectorAll('div')];

container.addEventListener('mouseover', (event) => {
    // set a random background color for the div the mouse is over
    // the other divs should be white
    
});

const getRandomColor = () => {
    // return a random rgb color
}

const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}