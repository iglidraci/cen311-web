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
            if (Math.random() > 0.5)
                resolve(currentCount);
            else
                reject(currentCount);
        }, Math.random() * 2000 + 1000);
    });
    promise.then(value => {
        logDiv.insertAdjacentHTML('beforeend', `<p style="color: green">Promise ${value} fulfilled</p>`);
    }).catch(value => {
        logDiv.insertAdjacentHTML('beforeend', `<p style="color: darkred">Promise ${value} rejected</p>`);
    });
};

btn.addEventListener('click', makePromise);

// promisify the click event in button

HTMLButtonElement.prototype.waitClick = function() {
    return new Promise((resolve, _) => {
        this.addEventListener('click', (event) => {
            resolve(event);
        })
    })
}

const onBtnClicked = async () => {
    await btn.waitClick();
    console.log('button clicked');
    onBtnClicked();
}

onBtnClicked();