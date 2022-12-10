function delay(ms) {
    return new Promise((resolve, _) => {
        setTimeout(resolve, ms);
    })
}

const networkCall = async (...args) => {
    console.log(`calling network with args: ${args}`);
    return Math.random() > 0.9; // 90% chance of failing
}

const every = async (action, seconds, tries, ...args) => {
    /**
     * action is the callback function
     * seconds is the number of seconds before the next action
     * tries is the total number of tries before clearing the interval
     * ...args are the unspecified number of arguments you want to pass to the callback function
     */
    return new Promise((resolve, reject) => {
        const intervalId = setInterval(async () => {
            const result = await action(...args);
            if (result) {
                resolve('network connected');
                clearInterval(intervalId);
            } else if (tries === 0) {
                reject('the network connection failed');
                clearInterval(intervalId);
            } else {
                tries--;
            }
        }, seconds * 1000);
    });
}

async function connectToNetwork() {
    try {
        await every(networkCall, 1, 5, 'google.com', 'foo');
    } catch (e) {
        console.log(e);
    }
}
connectToNetwork();

const evenNumberPromise = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            let nr;
            if ((nr = Math.trunc(Math.random() * 100)) % 2 == 0) {
                resolve(nr);
            } else {
                reject('Fatal error, no even number found, abort the mission');
            }
        }, 1000);
    })   
}

evenNumberPromise().then(console.log).catch(console.log);