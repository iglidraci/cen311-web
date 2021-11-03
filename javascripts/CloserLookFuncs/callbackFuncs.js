'use strict'

const oneWord = (str) => str.replace(/ /g, '').toLowerCase();

const upperFirstWord = (str) => {
    const splitted = str.split(' ');
    const newWord = [splitted[0].toUpperCase(), ...splitted.slice(1)];
    return newWord.join(' ');
}

const str = 'igli Draci hello world';

const transformer = (str, func) => func(str);

console.log(transformer(str, upperFirstWord));
console.log(transformer(str, oneWord));

// functions returning functions

const greet = (greeting) => {
    return (firstName) => `${greeting} ${firstName}`;
}

const hello = greet('hello')

const morning = greet('good morning');

console.log(hello('Igli'));
console.log(morning('igli'));

const greetFunc = greeting => firstName => `${greeting} ${firstName}`;

console.log(greetFunc('hello')('igli'));