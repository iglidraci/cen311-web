// we enclose the pattern in forward slash characters

console.log(/abc/.test("abcde"));
console.log(/abc/.test("abde"));

// set of characters
console.log(/[1-9]99[1-9]/.test("in 1992"));

/**
 * \d Any digit
 * \w An alphanumeric character (“word character”)
 * \s whitespace character (space, tab, newline)
 * \D A non-digit character
 * \W A non-alphanumeric character
 * \S A non-whitespace character
 * . Any character except for newline
 */

let dateTime = /\d\d-\d\d-\d\d\d\d \d\d:\d\d/;
console.log(dateTime.test("19-11-2022 00:00"));

// To invert a set of characters
let nonBinary = /[^01]/;
console.log(nonBinary.test("1001"));
console.log(nonBinary.test("12001"));