/**
 * The sort() method sorts the elements of an array in place and returns 
 * the reference to the same array, now sorted
 */

const months = ['March', 'Jan', 'Feb', 'Dec'];
months.sort();
console.log(months);
// expected output: Array ["Dec", "Feb", "Jan", "March"]

const array1 = [1, 30, 4, 21, 100000];
array1.sort();
console.log(array1);

/**
 * 
 * Functionless sort(), the array elements are converted to strings,
 * then sorted according to each character's Unicode code point value
 * 
 * Lambda function sort((a, b) => { ... } )
 * > 0 means sort a after b
 * < 0 means sort a before b
 * === keep original order of a and b
 */
const movements = [200, -100, 200, -50, -150, 250];

console.log(movements.sort());

console.log(movements.slice().sort((a, b) => a-b));
// What if I need them to be sorted in descending order?
