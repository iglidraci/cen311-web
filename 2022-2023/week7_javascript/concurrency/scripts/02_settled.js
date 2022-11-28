/**
 * Promise.allSettled()
 * Takes an iterable of promises as input and returns a single Promise
 * This returned promise fulfills when all of the input's promises settle
 * Returns an array of objects that describe the outcome of each promise
 * allSettled() will never reject
 */

const promise1 = Promise.resolve(1)
const promise2 = new Promise((resolve, _) => setTimeout(resolve, 1000, 2));
const promise3 = Promise.reject(new Error("an error occurred"));

Promise.allSettled([
    promise1,
    promise2,
    promise3
]).then(values => console.log(values));