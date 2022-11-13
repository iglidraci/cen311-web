/**
 * MDN reference: https://developer.mozilla.org/en-US/docs/Web/API/setInterval
 * setInterval() will repeatedly execute a function with a delay time between calls
 * Same signature as setTimeout()
 */

let count = 0;

const intervalId = setInterval(() => {
    console.log(Math.random());
    count++;
    if(count == 5) {
        clearInterval(intervalId);
    }
}, 500);

