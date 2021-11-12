'use strict';

// movements are in euros
const movements = [200, -100, 200, -50, -150, 250];

const firstDeposit = movements.find(x => x>0);
const firstWithdraw = movements.find(x => x<0);

console.log(`first deposit is ${firstDeposit} euro`);
console.log(`first withdraw is ${firstWithdraw} euro`);

// some and every

const anyDeposit = movements.some(x => x > 0);
console.log(anyDeposit);
console.log(movements.every(x => x>0));

// flat

const arr = [[1, 2, 3], [2, 3, 4, 5, 6], 6, [6, 7]];

console.log(arr.flat());

const deep = [[[1, 2, 3], [2, 3, 4]], 4, [2, 3]];
// it only goes one level deep if not specified
console.log(deep.flat(2))