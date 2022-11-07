/**
 * JSON is a popular serialization format used as a
 * data storage and communication format on the Web
 * All property names have to be surrounded by double quotes,
 * and only simple data expressions are allowed—no function calls, bindings, or
 * anything that involves actual computation. Comments are not allowed in JSON.
 */

let string = JSON.stringify({squirrel: false, events: ["weekend"]});
console.log(string); // → {"squirrel":false,"events":["weekend"]}

console.log(JSON.parse(string).events);