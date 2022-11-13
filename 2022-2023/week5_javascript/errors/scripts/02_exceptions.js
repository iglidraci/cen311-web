'use strict';

class InputError extends Error {}

const promptDirection = question => {
    let result = prompt(question);
    if (result.toLocaleLowerCase() == 'left') return 'L';
    else if (result.toLowerCase() == 'right') return 'R';
    throw new InputError(`Invalid exception: ${result}`);
}

try {
    console.log(promptDirection("Nowhere land?"));
} catch(error) {
    if (error instanceof InputError)
        console.log(`Invalid input: ${error}`);
    else
        console.log(`Unknown error: ${error}`)
} finally {
    console.log("done asking for directions");
}