'use strict';

console.log(25**(1/2));

console.log(27**(1/3));

console.log(Math.max(...[1, 2, 3, 4]));



let throwDie = () => Math.trunc(Math.random() * 6) + 1;

// for(let i=0; i<10; i++)
//     console.log(throwDie());


const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}

// random numbers between 2 and 10

for(let i=0; i<10; i++)
    console.log(randomIntBetween(2, 10));

console.log(+((2.9876).toFixed(2)));


// BigInt

const a = 12213213981281271212n;
const b = BigInt("12213213981281271212");

console.log(a+b);