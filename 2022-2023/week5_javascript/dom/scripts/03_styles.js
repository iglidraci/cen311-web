/**
 * Attributes
 * Some element attributes, such as href for links, can be accessed through a
 * property of the same name on the element’s DOM object.
 * If you make up your own attributes, use getAttribute and setAttribute to work with them 
 */


/**
 * JS directly manipulates the style of an element through the element's 'style' property
 */

const randomInteger = (lower, upper) => Math.floor(lower + (Math.random() * (upper - lower + 1)));

console.log(randomInteger(1, 4));
console.log(randomInteger(1, 4));
console.log(randomInteger(1, 4));


const generateRandomColor = () => {
    const [r, g, b] = Array.from({length: 3}, () => randomInteger(0, 255));
    return `rgb(${r}, ${g}, ${b})`; 
}

const niceP = document.getElementById('nice');

document.getElementById('change-color').addEventListener('click', () => {
    niceP.style.color = generateRandomColor();
    // font-weight you will have to access it style.fontWeight (without hyphen)
    niceP.style.fontWeight = Math.random() > 0.5 ? 'bold' : 'normal';
})