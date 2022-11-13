/**
 * "use strict" enables strict mode
 */

/**
 * Case 1
 * When you forget to put in front of your variable, JavaScript quietly creates a global variable and uses it
 * In strict mode, an error is reported instead
 */

function canYouSpotTheProblem() {
    "use strict";
    for (counter = 0; counter < 10; counter++) {
        console.log("Happy happy");
    }
}
canYouSpotTheProblem(); // → ReferenceError: counter is not defined

/**
 * Case 2
 * Another change in strict mode is that the "this" variable holds the value "undefined"
 * in functions that are not called as methods
 */


function Person(firstName) { this.firstName = name; }
let ferdinand = Person("Ferdinand"); // forget new
// → TypeError: Cannot set property 'firstName' of undefined

/**
 * In "sloppy" mode (unofficial term), the call to Person succeeded but returned an undefined value and
 * created the global variable firstName
 */

// Long story short, put "use strict" at the top of your script