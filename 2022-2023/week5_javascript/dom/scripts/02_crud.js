/**
 * All element nodes have a getElementsByTagName method, which collects all
 * elements with the given tag name that are descendants (not just children)
 * of that node and returns them as an array-like object
 * returns HTMLCollection (live collection, if the DOM changes, it gets updated automatically)
 */


let links = document.getElementsByTagName("a");

console.log(links);

/**
 * To find a specific single node, you can give it an id attribute and use document.getElementById
 */

const form = document.getElementById('loginForm');
console.log(form);

/**
 * A third, similar method is getElementsByClassName, which, like getElementsByTagName,
 * searches through the contents of an element node and retrieves all elements
 * that have the given string in their class attribute
 */

const message = document.createElement('div');
message.classList.add('simple-message');
message.innerHTML = 'Just display a simple message<br><button id="delete-btn">Test me</button>';
const messageDiv = document.getElementsByClassName('message')[0];
messageDiv.append(message);
messageDiv.appendChild()
// won't insert it twice
// A node can exist in the document in only one place
// messageDiv.prepend(message);
// in case you want the node twice: messageDiv.append(message.cloneNode(true));

// will append them as siblings of messageDiv
// messageDiv.before(message);
// messageDiv.after(message);

document.getElementById('delete-btn').addEventListener('click', () => {
    // no need to select it, already have it stored in RAM
    message.remove();
});