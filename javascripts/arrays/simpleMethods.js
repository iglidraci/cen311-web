'use strict';
/**
 * slice method
 */
let array = [1, 2, 3, 4, 5, 6];
console.log(array.slice(1, 4));
// don't include the last two elements
console.log(array.slice(0, -2));
// last two elements
console.log(array.slice(-2));
// shallow copy of an array
// or ... operator, it's the same
console.log(array.slice())


/**
 * splice method
 * is the same as slice but it mutates the array
 */

// remove the last element
array.splice(-1);
console.log(array);


/**
 * reverse method
 */

array = ['a', 'b', 'c', 'd'];
// original array is mutated as well
console.log(array.reverse());
console.log(array);

/**
 * concat and join methods
 */

const numbers = ['1', '2', '3'];

const alphaNum = array.concat(numbers);

console.log(alphaNum);
console.log([...array, ...numbers])
console.log(alphaNum.join(','));

