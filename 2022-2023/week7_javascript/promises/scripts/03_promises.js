/**
 * Advanced examples
 */

'use strict';

const logDiv = document.querySelector('#log');
const btn = document.querySelector('#make-promise');
let promiseCount = 0;

const makePromise = () => {
    const currentCount = ++promiseCount;
    logDiv.insertAdjacentHTML('beforeend', `<p>Promise ${currentCount} started</p>`);
    const promise = new Promise((resolve, reject) => {
        logDiv.insertAdjacentHTML('beforeend', `<p>Promise ${currentCount} constructor</p>`);
        setTimeout(() => {
            resolve(currentCount);
        }, Math.random() * 2000 + 1000);
    });
    promise.then(value => {
        logDiv.insertAdjacentHTML('beforeend', `<p>Promise ${value} fulfilled</p>`);
    }).catch(reason => {
        console.log(`Promise rejected because: ${reason}`);
    });
};

btn.addEventListener('click', makePromise);


