function randomPointOnCircle(radius) {
    let angle = Math.random() * 2 * Math.PI;
    return {x: radius * Math.cos(angle), y: radius * Math.sin(angle)};
}

console.log(randomPointOnCircle(2));

/**
 * Math.random() returns a new pseudorandom number between zero (inclusive) 
 * and one (exclusive) every time you call it.
 */

console.log(Math.floor(Math.random() * 10));
console.log(Math.ceil(Math.random() * 10));


console.log(25**(1/2));

console.log(27**(1/3));

console.log(Math.max(...[1, 2, 3, 4]));

const throwDie = () => Math.trunc(Math.random() * 6) + 1;

const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}

/**
 *  BigInt
 * To create a BigInt, append n to the end of an integer or call BigInt()
 */

const a = 12213213981281271212n;
const b = BigInt("12213213981281271212");

console.log(a+b);