'use strict';


let myName = 'John';
console.log(typeof myName);

myName = 2;
console.log(typeof myName);

let city;
console.log(typeof city);
console.log(typeof null);

let age = 23;
age++;
const firstName = "Ben";

lastName = "Morgan";
console.log(lastName);

const isOld = age > 120;

const describe = `I'm ${firstName}, ${age} year old, I'm ${isOld ? 'old' : 'young'}`;
console.log(describe);

const birthYear = '1998';
console.log(Number(birthYear), birthYear);

console.log(Number('alice')); // produce NaN
console.log(typeof NaN);

console.log('40' - '20' - 15); // - operater turn them into numbers
console.log('20' * '2'); // * turn them into numbers



let n = '2' + 1;
n = n - 1;

// guess what will be printed
console.log(n);
const head = document.getElementsByTagName('body');
console.log(head);