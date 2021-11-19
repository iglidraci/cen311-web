// selecting, creating and deleting elements

// dom
console.log(document.documentElement);
console.log(document.head);
console.log(document.body);

// this returns NodeList
// if we change the DOM, won't change
const allPara = document.querySelectorAll('.para');
console.log(allPara);

const para1 = document.getElementById('para-1');

// returns HTMLCollection 
// (live collection, if the DOM changes, it gets updated automatically)
const allParagraphs = document.getElementsByTagName('p');

console.log(allParagraphs);
const paraClass = document.getElementsByClassName('para');

// create
const message = document.createElement('div');

message.classList.add('simple-message');

message.innerHTML = 'Just display a simple message<br><button class="delete">Test me</button>';

const messageDiv = document.querySelector('.message');
// won't insert it twice 
messageDiv.prepend(message);
messageDiv.append(message);
// in case you want it twice
// messageDiv.append(message.cloneNode(true));

// will append them as siblings of messageDiv
// messageDiv.before(message);
// message.after(message);


// delete elements

// no need to select it, already have it stored in ram
// in case you haven't, query select it first then delete it
document.querySelector('.delete').addEventListener(
    'click', () => {
        message.remove();
    }
);