/* 
the name must not start with a digit. A variable name may include 
dollar signs ($) or underscores (_) but no other punctuation or special characters
*/

let first_name = 'Foo';
let age = 10;

age += 1;
console.log(`${first_name} is ${age} years old`); // browser environment

first_name = prompt('enter your name');

console.log(Math.max(2, 4));

age = Number(prompt("enter your age"));

if (!Number.isNaN(age)) {
    console.log(`new name is ${first_name}, ${age} years old`);
} else {
    console.log("No number provided");
}

// while loop

let result = 1
let i = 1;
while (i++ <= 10) {
    result *= 2;
}
console.log(`2^10=${result}`)

do {
    first_name = prompt("what was your name again?")
} while(!first_name);

console.log(first_name);

// for loop

for(let i=0; i <= 10; i += 2) {
    console.log(i);
    // -> 0 2 ... etcetera
}

// breaking out of the for loop

for(let i=2; ; i++) {
    if (i%2 ^ i%3) {
        console.log(`${i} is divisible by 2 or 3 but not both`);
        break;
    }
}

// switch statement
switch(+prompt("what day is today?")) {
    case 0:
    case 1:
    case 2:
    case 3:
    case 4:
        console.log("weekday");
        break;
    case 5:
    case 6:
        console.log("weekend");
        break;
    default:
        console.log("wrong day");
}

const gender = 'M';