/**
 * Special syntax called "async/await"
 * The async and await keywords enable asynchronous, promise-based 
 * behavior to be written in a cleaner style, avoiding the need to explicitly 
 * configure promise chains.
 */

/**
 * The word "async" before function declaration means: function will
 * always return a promise
 */

async function foo() {
    // return a resolved promise with value "foo"
    // same as Promise.resolve("foo");
    return "foo";
}

foo().then(console.log);

/**
 * Keyword "await" works only inside "async" functions
 * "await" makes promise-returning functions behave as synchronous
 * They suspend the execution until promise is settled (fulfilled or rejected)
 * The settled value of the promise is treated as the return value
 */

async function bar() {
    let promise = new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("success");
        }, 1000);
    });
    let result = await promise; // wait until promise resolves
    console.log(result);
}

bar();

/**
 * "await" allows us to use "thenable" objects
 * if you have a method "then", it's enough for "await" to work
 */

/**
 * Error handling
 * If the settled state of a promise is "fulfilled", then "wait promise" returns
 * the result.
 * In case of "rejected", it throws an error
 */

const baz = async () => {
    try {
        await Promise.reject("something went wrong!");
        console.log(`everything went well`);
    } catch (error) {
        alert(error);
    }
}
// baz();