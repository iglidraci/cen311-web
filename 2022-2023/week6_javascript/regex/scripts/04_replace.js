/**
 * g option (global) means all matches in the string will be replaced
 */

console.log("Armagewzon".replace(/[wz]/, "d")); // → Armagedzon
console.log("Armagewzon".replace(/[wz]/g, "d")); // → Armageddon

const presidents = 'Eisenhower, Dwight\nKennedy, John'
console.log(presidents);

console.log(presidents.replace(/(\w+), (\w+)/g, "$2 $1"));

// find all numbers and decrement them by one
let stock = "1 lemon, 2 cabbages, and 101 eggs";

const refactor = (match, amount, unit) => {
    amount = amount - 1;
    if (amount == 1) { // remove s in the end of the unit
        unit = unit.slice(0, -1);
    } else if (amount == 0) {
        amount = "no";
    }
    return `${amount} ${unit}`;
}

console.log(stock.replace(/(\d+) (\w+)/g, refactor));