'use strict';

const euroToLek = 123;
// movements are in euros
const movements = [200, -100, 200, -50, -150, 250];

// map
const movementsLek = movements.map(x => x*euroToLek);

// filter
const deposits = movements.filter(x => x>0);
const withdraws = movements.filter(x => x < 0);

console.log(movementsLek);

console.log(withdraws);

// reduce
// boil down all the elements in an array into one number

const balance = console.log(movements.reduce((x, y) => x+y));

console.log(`balance=${balance}`);


// chaning methods
// let's see how much lek we have deposit during our movements

let lekDeposit = movements.filter(x => x > 0)
                            .map(x => x * euroToLek)
                            .reduce((x, y) => x+y)

console.log(`you have deposited ${lekDeposit} leke`);

// make it generic to use for withdraws and deposits

const totalInLek = function(array, filterFunc) {
    return array.filter(filterFunc)
                .map(x => x * euroToLek)
                .reduce((x, y) => x+y);
}

lekDeposit = totalInLek(movements, x=>x>0);
let lekWithdraw = totalInLek(movements, x => x<0);
let totalBalance = totalInLek(movements, _=>true);

console.log(`you have deposited ${lekDeposit} leke`);
console.log(`you have withdrawn ${lekWithdraw} leke`);
console.log(`total balance is ${totalBalance} leke`);