/**
 * Hoisting refers to JavaScript giving higher precedence to the declaration of variables,
 * classes, and functions during a program’s execution
 */

let author = "Norman Finkelstein";

let favoriteAuth = () => {
    console.log(author); // -> What is the output?
    let author = "Noam Chomsky";
};

// Invoke the function:
favoriteAuth();