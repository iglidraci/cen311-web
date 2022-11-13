'use strict';

/**
 * Function passed to setTimeout cannot be executed until the thread that called setTimeout() has terminated
 * This is because even though setTimeout was called with a delay of zero, it's placed on a queue 
 * and scheduled to run at the next opportunity.
 * Currently-executing code must complete before functions on the queue are executed,
 * thus the resulting execution order may not be as expected.
 */

console.log("first call")
setTimeout(() => {
    console.log('second call');
    setTimeout(() => {
        console.log("third call");
    }, 0);
}, 0);
console.log("fourth call");