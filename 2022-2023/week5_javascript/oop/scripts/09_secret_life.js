/**
 * The secret life of JS primitives
 * Primitive values (null, undefined, string, number, boolean) have
 * no properties.
 * Boolean, number and string can be wrapped in objects.
 */

console.log(typeof true); // -> boolean
console.log(typeof Boolean(true)); // -> boolean
console.log(typeof new Boolean(true)); // -> object

console.log(typeof "hello"); // -> string
console.log(typeof String("hello")); // -> string
console.log(typeof new String("hello")); // -> object

/**
 * We said primitives have no properties, how come "hello".length works?
 * Because JS coerces between primitive and values in split seconds
 */

String.prototype.returnObj= function() {
    return this;
}

const str = "hello";
const str2 = str.returnObj();  

console.log(str, typeof(str));
console.log(str2, typeof(str2));

/**
 * They coerce down to their primitive value
 */

const ten = new Number(10); 
const eleven = ten + 1; 
console.log(eleven);

/**
 * Boolean objects do not coerce easily
 * Only null and undefined coerce to 'false'
 */

if (new Boolean(false)) {
    console.log("Guaranteed that I wont get printed ...");
}

/**
 * Still can't assign properties to primitives
 */

let day = 10;
day.weather = 'good';

console.log(day.weather); // -> undefined