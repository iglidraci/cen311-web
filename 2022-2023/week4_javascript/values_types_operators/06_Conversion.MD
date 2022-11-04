JavaScript is odd

console.log(8 * null) // → 0

console.log("5" - 1) // → 4

console.log("5" + 1) // → 51

console.log("5" + (-1)) // → 5-1

console.log("five" * 2) // → NaN

console.log(false == 0) // → true

Type coercion

When comparing values of the same type using ==, you should get true when both values are the same, except in the case of NaN

console.log(null == undefined); // → true

console.log(null == 0); // → false

Expressions like 0 == false and "" == false are true because of automatic type coercion

If you don't want any type conversion to happen, use === and !==
=== tests whether a value is precisely equal to the other

Short-circuiting of logical operators

console.log('aa' || 'bb') // -> aa
console.log('aa' && 'bb') // -> bb