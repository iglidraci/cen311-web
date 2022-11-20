'use strict';

const btn = document.getElementById('click-btn');

btn.addEventListener('mousedown', event => {
    if (event.button === 0)
        alert('left button clicked');
    else if (event.button === 1)
        alert('middle button clicked');
    else if (event.button === 2)
        alert('right button clicked');
});

// btn.addEventListener('mousedown', console.log);

/**
 * If button is inside the paragraph, event handler on paragraph will
 * be triggered as well.
 * The one on the button gets executed first regardless of the declaration order.
 * The event propagates from the node where it started to the root
 */

const p = document.getElementById('click-p');

p.addEventListener('mousedown', console.log);

/**
 * At any point, an event handler can stop the event propagation
 * Calling event.stopPropagation()
 */


/**
 * Most events have a property 'target' that represents the node
 * that activated it
 */

/**
 * JS event handlers have higher precedence than default handlers
 */

document.getElementById('twitter-a').addEventListener('click', event => {
    console.log("won't let you open twitter");
    event.preventDefault();
})