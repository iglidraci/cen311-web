/**
 * exec method will return an object with information about the match
 */

// starts and ends on a word boundary
console.log(/\bcat\b/.test("cat is a cat")); // -> true

// pipe (|) denotes a choice

let firstQuarter = /\b\d{1,2} (jan|feb|mar)\b/;
console.log(firstQuarter.test('1 jan'))
