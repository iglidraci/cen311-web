const THRESHOLD = 5;

const tetheredGetNumber = (resolve, reject) => {
    setTimeout(() => {
        const randomInt = Date.now();
        const value = randomInt % 10;
        if (value < THRESHOLD)
            resolve(value);
        else
            reject(`Too large: ${value}`);
    }, 500);
}

const determineParity = (value) => {
    const isOdd = value % 2 === 1;
    return {value, isOdd};
}

const onGetNumberError = (reason) => {
    throw new Error("Trouble getting number", {reason});
}

const promiseGetWord = (parityInfo) => {
    return new Promise((resolve, reject) => {
        const {value, isOdd} = parityInfo; // deconstructing the object
        if (value >= THRESHOLD - 1) {
            reject(`Still to large: ${value}`);
        } else {
            parityInfo.word = isOdd ? "odd" : "even";
            resolve(parityInfo);
        }
    })
}

new Promise(tetheredGetNumber)
    .then(determineParity, onGetNumberError)
    .then(promiseGetWord)
    .then((info) => {
        console.log(`Got: ${info.value}, ${info.word}`);
        return info;
    })
    .catch(error => {
        if (error.reason) {
            console.error('Had previously handled error');
        } else {
            console.error(`error with promiseGetWord(): ${error}`);
        }
    })
    .finally(() => {
        console.log('all done');
    })