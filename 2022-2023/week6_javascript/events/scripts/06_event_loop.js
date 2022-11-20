/**
 * Event loop is responsible for collecting and processing events, executing queued sub-tasks
 * Heap -> stores objects
 * Stack -> stores function frames
 * Queue -> list of messages to be processed. Each message contains a function to be executed
 * Event loop is usually implemented:
 * while(queue.waitForMessage()) {
 *  queue.processNextMessage();
 * }
 * 
 * Run-to-completion -> Each message is processed completely before any other message is processed
 */

const start = new Date().getTime();

/**
 * The second argument in setTimeout (the delay argument) indicates a minimum time — not a guaranteed time
 * Below is the reason why
 */
setTimeout(() => {
console.log(`Ran after ${(new Date().getTime() - start)/1000} seconds`);
}, 500);

while (true) {
    const gone = new Date().getTime() - start;
    if (gone <= 2000) {
        console.log("still looping ...");
    } else {
        break;
    }
}

