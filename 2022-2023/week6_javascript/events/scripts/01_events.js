'use strict';

const onWindowClick = function () {
    console.log("window was clicked ...");
}

window.addEventListener('click', onWindowClick);

// remove the event listener
// the function has to be the same that was given above
document.getElementById('cancel-window').addEventListener('click', () => {
    window.removeEventListener(onWindowClick);
});