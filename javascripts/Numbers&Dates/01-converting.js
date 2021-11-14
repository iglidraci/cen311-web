'use strict';

// one one data type Number
console.log(10 == 10.0);

console.log(0.1 + 0.2 === 0.3);

console.log(Number("14"));
console.log(+"14");
console.log(Number.parseInt("40Helloworld"));

console.log(Number.parseFloat("40.6cm"));

// gives Infinity
console.log(40/0);

console.log(Number.isNaN(20));

// the best way to check if the value is a real number not a string
console.log(Number.isFinite(20));

console.log(Number.isFinite(20/0));

console.log(Number.isFinite('20'));

console.log(Number.isInteger(20.3));

console.log(Number.isInteger(20));