'use strict';

/**
 * Events are actions occurring in the system which the system
 * tells you so that you can handle them.
 * For example: if a user clicks a button you might want to
 * do something after it.
 * Web events are not part of JS, they are APIs built into the browser
 */

const onWindowClick = function () {
    console.log("window was clicked ...");
}


window.addEventListener('click', onWindowClick);

// remove the event listener
// the function has to be the same that was given above
document.getElementById('cancel-window').addEventListener('click', () => {
    window.removeEventListener(onWindowClick);
});