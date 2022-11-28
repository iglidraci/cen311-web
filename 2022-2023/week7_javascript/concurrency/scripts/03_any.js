/**
 * Promise.any() method takes an iterable of promises as input and returns a single Promise
 * This returned promise fulfills when any of the input's promises fulfills,
 * with this first fulfillment value.
 * It rejects when all of the input's promises reject
 */

const promise1 = Promise.reject(1);
const promise2 = new Promise((_, reject) => setTimeout(reject, 1000, 1));
const promise3 = new Promise((resolve, _) => setTimeout(resolve, 2000, 2));

const promises = [promise1, promise2, promise3];

Promise.any(promises).then((value) => console.log(value));