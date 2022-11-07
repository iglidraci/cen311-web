const euroToLek = 120;
// transactions in euros
const transactions = [200, -100, 200, -50, -150, 250];

// map
const movementsLek = transactions.map(x => x*euroToLek);

// filter
const deposits = transactions.filter(x => x>0);
const withdraws = transactions.filter(x => x < 0);

console.log(movementsLek);

console.log(withdraws);

console.log(deposits);

// reduce

const balance = console.log(transactions.reduce((x, y) => x+y));

console.log(`balance=${balance}`);


// chaining methods

let lekDeposit = transactions.filter(x => x > 0)
                            .map(x => x * euroToLek)
                            .reduce((x, y) => x+y)

console.log(`you have deposited ${lekDeposit} Lek`);

// make it generic to use for withdraws and deposits

const totalInLek = (array, filterFunc) => {
    return array.filter(filterFunc)
                .map(x => x * euroToLek)
                .reduce((x, y) => x+y);
}

lekDeposit = totalInLek(transactions, x=>x>0);
let lekWithdraw = totalInLek(transactions, x=>x<0);
let totalBalance = totalInLek(transactions, _=>true);

console.log(`you have deposited ${lekDeposit} lek`);
console.log(`you have withdrawn ${lekWithdraw} lek`);
console.log(`total balance is ${totalBalance} lek`);