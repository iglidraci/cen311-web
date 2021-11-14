'use strict';


const sec = document.querySelector('section');

// only direct children
console.log(sec.children);

console.log(sec.querySelectorAll('a'));

// passing arguments to the event handlers

const nav = document.querySelector('nav');

const changeColorsEvent = (event, color1, color2) => {
    if (event.target.classList.contains('nav-link')) {
        const link = event.target;
        const allLinks = nav.querySelectorAll('a');
        allLinks.forEach(x => {
            if(x !== link)
                x.style.backgroundColor = color1;
            else
                x.style.backgroundColor = color2;
        })
    }
};

nav.addEventListener(
    'mouseover', (event) => changeColorsEvent(event, 'green', 'blue') 
);
nav.addEventListener(
    'mouseout', (event) => changeColorsEvent(event, 'red', 'yellow')
);