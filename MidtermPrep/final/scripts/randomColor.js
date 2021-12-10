'use strict';


const container = document.querySelector('.container');
const allDivs = [...container.querySelectorAll('div')];

container.addEventListener('mouseover', event => {
    const index = allDivs.indexOf(event.target);
    allDivs.forEach((element, i) => {
        if (i == index)
            element.style.backgroundColor = getRandomColor();
        else
            element.style.backgroundColor = '';
    });
});

const getRandomColor = () => {
    const nr1 = randomIntBetween(0, 255);
    const nr2 = randomIntBetween(0, 255);
    const nr3 = randomIntBetween(0, 255);
    return `rgb(${nr1}, ${nr2}, ${nr3})`;
}

const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}