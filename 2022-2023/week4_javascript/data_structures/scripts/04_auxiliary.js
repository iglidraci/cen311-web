// movements are in euros
const movements = [200, -100, 200, -50, -150, 250];
// first element where the predicate is true otherwise undefined
const firstDeposit = movements.find(x => x>0);
const firstWithdraw = movements.find(x => x<0);

console.log(`first deposit is ${firstDeposit} euro`);
console.log(`first withdraw is ${firstWithdraw} euro`);

// some and every

// determines whether for any element of an array, the predicate returns true
const anyDeposit = movements.some(x => x > 0);
console.log(anyDeposit);
// Determines whether all the members of an array satisfy the specified test
console.log(movements.every(x => x>0));

// flat

const arr = [[1, 2, 3], [2, 3, 4, 5, 6], 6, [6, 7]];

console.log(arr.flat());

const deep = [[[1, 2, 3], [2, 3, 4]], 4, [2, 3]];
// it only goes one level deep if not specified
console.log(deep.flat(2));

const array = new Array(10);
console.log(array);

// value to fill, start index
array.fill(10, 3);
console.log(array);

// Array.from

// fill with one
console.log(Array.from({length: 10}, () => 1));

console.log(Array.from({length: 10}, (_, index) => index+1)); // -> Output?