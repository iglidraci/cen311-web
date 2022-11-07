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