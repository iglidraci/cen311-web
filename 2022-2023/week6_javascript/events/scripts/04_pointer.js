'use strict';

const canvas = document.getElementById('canvas');

window.addEventListener('click', event => {
    const point = document.createElement('div');
    point.className = 'dot';
    point.style.top = event.clientX + "px";
    point.style.left = event.clientY + "px";
    document.body.appendChild(point);
})

/**
 * Every time the mouse pointer moves, a "mousemove" event is fired
 */

let lastX; // Tracks the last observed mouse X position
let bar = document.querySelector("#drag-div");

bar.addEventListener("mousedown", event => {
    if (event.button == 0) {
        lastX = event.clientX;
        window.addEventListener("mousemove", moved);
        event.preventDefault(); // Prevent selection
    }
});

function moved(event) {
    if (event.buttons == 0) {
        // number of buttons currently held down
        window.removeEventListener("mousemove", moved);
    } else {
        let dist = event.clientX - lastX;
        let newWidth = Math.max(10, bar.offsetWidth + dist);
        bar.style.width = newWidth + "px";
        lastX = event.clientX;
    }
}