'use strict';

window.addEventListener('keydown', event => {
    if (event.key == 'c')
        document.body.style.backgroundColor = 'yellow';
});

window.addEventListener('keyup', event => {
    if (event.key == 'c')
        document.body.style.backgroundColor = '';
});

/**
 * Check the properties shiftKey, ctrlKey, altKey, and metaKey
 * to verify whether they are pressed or not
 */

window.addEventListener('keydown', event => {
    if (event.key == '/' && event.ctrlKey)
        console.log("search something ...")
})