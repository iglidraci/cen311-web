// It is possible for multiple interfaces to use the same property name for different things

/**
 * Symbol is a built-in object whose constructor returns a symbol primitive — also called a Symbol value or just a Symbol
 * Symbols are often used to add unique property keys to an object that won't collide with keys any other code might add to the object
 */

const sym1 = Symbol('toString');
const sym2 = Symbol('toString');

console.log(sym1 == sym2);

const toStringSymbol = Symbol("toString");

Array.prototype[toStringSymbol] = function() {
    return `Length of array is ${this.length}`;
}

const arr = [1, 2, 3];

console.log(arr.toString());
console.log(arr[toStringSymbol]());