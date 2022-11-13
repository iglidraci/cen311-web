'use strict';

/**
 * MDN reference: https://developer.mozilla.org/en-US/docs/Web/API/setTimeout
 * 
 * The global setTimeout() method sets a timer which executes a function once the timer expires
 * setTimeout(functionRef, delay, ...params)
 * functionRef is a function to be executed after the timer expires.
 * delay is in milliseconds
 * ...params are additional arguments which are passed to the function you execute inside setTimeout
 * The return value is the id of the timeout. Is usually used to cancel the timer
 * clearTimeout() is used to cancel timeouts
 */

console.log("Entering the restaurant")

function eat(food='pizza') {
    console.log(`Eating ${food} after 2 seconds`);
}

// it runs only once
setTimeout(eat, 2000);

setTimeout(eat, 2000, 'soup');

setTimeout(() => {console.log("first print")}, 5000);
setTimeout(() => {console.log("second print")}, 4000);
setTimeout(() => {console.log("third print")}, 3000);