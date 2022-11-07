/**
 * Write a higher-order function loop that provides something like a for loop statement.
 * It takes a value, a test function, an update function, and a body function
 * Each iteration, it first runs the test function on the current loop value
 * and stops if that returns false
 */


const myLoop = (current, predicate, update, action) => {
    while (predicate(current)) {
        action(current);
        current = update(current);
    }
}

myLoop(1, x => x <= 10, x => x + 1, console.log);


/**
 * Use the reduce method in combination with the concat method to “flatten”
 * an array of arrays into a single array that has all the elements of the original arrays
 */


const matrix = [[1, 2, 3], [4, 5, 6], [7]];

const flatten = m => m.reduce((a, b) => a.concat(b), []);

console.log(flatten(matrix));

