/**
 * A block’s temporal dead zone starts at the beginning of the block’s local scope.
 * It ends when we initialize the variable with a value
 */
// console.log(firstName);
let firstName = 'Foo';

let lastName; // lastName TDZ ends here
console.log(lastName);
lastName = 'Bar';
console.log(lastName);

/**
 * TDZ principles of let variables apply also to const
 */

/**
 *  var variable’s TDZ ends after its hoisting
 */

console.log(middleName);
var middleName = 'Baz';
console.log(middleName);

// this is a problem that might occur with var
var position = 'junior';
var workingYears = 20;
if (workingYears > 5) {
    var position = 'senior';
}
console.log(`position is ${position}`);