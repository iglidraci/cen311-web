'use strict';

const array = new Array(10);
console.log(array);

// value to fill, start index
array.fill(10, 3);
console.log(array);

// Array.from

// fill with one
console.log(Array.from({length: 10}, () => 1));

console.log(Array.from({length: 10}, (_, index) => index+1));
