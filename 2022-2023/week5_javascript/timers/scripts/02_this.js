'use strict';

const arr = ['botany', 'math', 'chemistry']

arr.foo = function (index) {
    console.log(arguments.length > 0 ? this[index] : this);
};

arr.foo();
arr.foo(1);

/**
 * The arr.foo function is passed to setTimeout, 'this' points to the window object
 */

setTimeout(arr.foo, 1.0*1000); // prints "[object Window]" after 1 second
setTimeout(arr.foo, 1.5*1000, '1'); // prints "undefined" after 1.5 seconds

// Solutions

// 1) Wrapper functions

 setTimeout(() => {arr.foo()}, 2.0 * 1000);
 setTimeout(() => {arr.foo('1')}, 2.5 * 1000);

// 2) Use bind()

const fooBound = (function (x) {
    if (x) console.log(this[x]);
    else console.log(this);
}).bind(arr);

fooBound(); // prints the whole array object
fooBound(0); // prints botany
setTimeout(fooBound, 1.0*1000); // prints the whole array object
setTimeout(fooBound, 1.5*1000, 0); // prints botany
