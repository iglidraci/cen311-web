/**
 * MDN reference: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Promise
 * The Promise object represents the eventual completion (or failure) of
 * an asynchronous operation and its resulting value.
 * A Promise is in one of these states:
 * 1) pending: initial state, neither fulfilled nor rejected.
 * 2) fulfilled: meaning that the operation was completed successfully.
 * 3) rejected: meaning that the operation failed.
 */

 const evenNumberPromise = new Promise((resolve, reject) => {
    console.log('Trying to find a number ...');
    setTimeout(() => {
        let nr;
        if ((nr = Math.trunc(Math.random() * 100)) % 2 == 0) {
            resolve(`Here's your benevolent even number : ${nr}`);
        } else {
            reject('I disappointed you 😔');
        }
    }, 1000);
 })


 evenNumberPromise.then(console.log).catch(console.error);

 // promisify the setTimeout

 const wait = (seconds) => {
    return new Promise((resolve, _) => {
        // setTimeout will never reject
        setTimeout(resolve, seconds * 1000);
    })
 };

 wait(1)
    .then(() => {
        console.log('first call');
        return wait(0);
    })
    .then(() => {
        console.log('second call');
        return wait(0);
    })
    .then(() => {
        console.log('final call');
    })
    .then(console.log); // -> undefined even though we haven't returned anything


/**
 * Thenables
 *  A thenable implements the .then() method, which is called with two callbacks:
 *  one for when the promise is fulfilled, one for when it's rejected.
 * Promises are thenables as well
 */

const aThenable = {
    then: (resolve, reject) => {
        resolve({
            // the thenable is resolved with another thenable
            then: (resolve, reject) => {
                resolve('hello');
            }
        })
    }
};

Promise.resolve(aThenable).then(console.log); // will resolve the promise immediately
