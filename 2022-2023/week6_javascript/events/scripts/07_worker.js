/**
 * Web Workers are used to run scripts in the background thread
 * A worker is an object created new Worker('js file'), the JS file contains the code to run in the worker's thread
 * You can run any code you want inside a worker beside from manipulating DOM directly
 * or using some methods from window object
 * Communication between workers and the main thread is carried out via a system of messages
 * Sending messages: postMessage() method
 * Responding to messages: onmessage event handler
 * Data are copied rather than shared
 * Make sure to use http:// protocol not file://
 */

// spawning a dedicated worker

if (window.Worker) {
    // it's a good practice to wrap your worker code, google why
    const worker = new Worker('scripts/workers/add.js'); // path has to be relative to the index.html
    document.getElementById('add-btn').addEventListener('click', () => {
        const nr1 = +document.getElementById('nr1').value;
        const nr2 = +document.getElementById('nr2').value;
        worker.postMessage([nr1, nr2, new Date()]);
        console.log('message posted to add worker');
    })
    
    worker.onmessage = (e) => {
        console.log(`result received from worker is ${e.data}`);
    };
    document.getElementById('terminate-worker').addEventListener('click', () => {
        worker.terminate();
    })
}

