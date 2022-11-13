let empty = {}

console.log(empty.toString); // -> function toString()…{}
console.log(empty.toString()); // -> [object Object]

/**
 * Most objects have a prototype which is another object that is used
 * as a fallback source of properties
 * Object.prototype is the ancestral prototype behind almost all objects
 */

console.log(Object.getPrototypeOf(empty) == Object.prototype); // -> true
console.log(Object.getPrototypeOf(Object.prototype)); // -> null

/**
 * Functions derive directly from Function.prototype
 * Arrays from Array.prototype
 */

console.log(Object.getPrototypeOf(Math.floor) == Function.prototype); // -> true
console.log(Object.getPrototypeOf([]) == Array.prototype); // -> true


// You can use Object.create to create an object with a specific prototype

let protoCat = {
    speak(line) {
        console.log(`The ${this.type} cat says '${line}'`);
    }
};

let angryCat = Object.create(protoCat);
angryCat.type = 'angry';
angryCat.speak('hiss');
