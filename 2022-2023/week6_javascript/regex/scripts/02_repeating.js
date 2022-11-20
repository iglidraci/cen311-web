/**
 * (+) after a pattern in a regular expression, it indicates that the element may be repeated once or more
 * (*) zero or more
 * (?) zero times or once
 * {4} exactly 4 times
 * {2, 4} at least twice at most four times
 */

console.log(/'\d+'/.test("'5'")); // -> true
console.log(/'\d*'/.test("'5'")); // -> true
console.log(/'\w+\d*'/.test("'aa'")); // -> true

let neighborPattern = /neighbou?r/;
console.log(neighborPattern.test("neighbour")); // → true
console.log(neighborPattern.test("neighbor")); // → true

let dateTime = /\d{1,2}-\d{1,2}-\d{4} \d{1,2}:\d{2}/;
console.log(dateTime.test("01-01-2023 08:45")); // -> true
console.log(dateTime.test("1-1-2023 8:45")); // -> true

// A part of a regular expression that is enclosed in parentheses counts as a single element

let cacophony = /boo+(hoo+)+/i; // i in the end makes the pattern case insensitive
console.log(cacophony.test("Boohoooohoohooo")); // -> true
console.log(cacophony.test("Bohoooohoohooo")); // -> false
console.log(cacophony.test("Boohooaaa")); // -> true
console.log(cacophony.test("Booho")); // -> false

