let timeoutID;

function delayedMessage() {
    timeoutID = setTimeout(alert, 2*1000, 'Tadaa!');
}

function clearMessage() {
    clearTimeout(timeoutID);
}