/**
 * The Promise class offers four static methods for async task concurrency
 */

/**
 * Promise.all()
 * Takes an iterable of promises as input and returns a single Promise
 * This returned promise fulfills when all of the input's promises fulfill
 * Returns an array with fulfillment values (in the same order as the initial iterable)
 * It rejects immediately when any of the input's promises rejects with the first rejection reason
 * Basically: we want all the promises to fulfill before the code execution continues
 */

const promise1 = Promise.resolve(1);
const promise2 = 2;
const promise3 = new Promise((resolve, reject) => {
    setTimeout(resolve, 2000, 'foo');
});

Promise.all([promise1, promise2, promise3]).then(values => {
    console.log('All promises fulfilled successfully');
    console.log(values);
}).catch(console.error);
