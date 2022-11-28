/**
 * Promise.race() method takes an iterable of promises as input and returns a single Promise
 * This returned promise settles with the eventual state of the first promise that settles
 */

const promise1 = new Promise((resolve, _) => setTimeout(resolve, 1000, 'quick'));
const promise2 = new Promise((_, reject) => setTimeout(reject, 2000, 'slow'));

Promise.race([promise1, promise2]).then(console.log).catch(console.error);