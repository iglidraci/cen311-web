let sequence = [1, 2, 3, 4];
console.log(sequence.length);
console.log(sequence['length']);

sequence.push(5);
console.log(sequence); // -> [1, 2, 3, 4, 5]
console.log(sequence.pop()); // -> 5
console.log(sequence); // -> [1, 2, 3, 4]
console.log(sequence.indexOf(2));
// Both indexOf and lastIndexOf take an optional second argument that indicates
// where to start searching

sequence.unshift(0);
console.log(sequence);
sequence.unshift();
console.log(sequence);


/*
slice method
*/
// start is inclusive, end is exclusive
console.log(sequence.slice(1, 3));
// don't include the last two elements
console.log(sequence.slice(0, -2));
// last two elements
console.log(sequence.slice(-2));
// shallow copy of an array
// or ... operator, it's the same
console.log(sequence.slice())
console.log(sequence);

/**
splice method is the same as slice but it mutates the array
*/

// remove the last element
sequence.splice(-1);
console.log(sequence);

/*reverse method, it mutates the original array*/

const chars = ['a', 'b', 'c', 'd'];
console.log(chars.reverse());
console.log(chars);

const numerical = ['1', '2', '3'];


const alphaNum = chars.concat(numerical);

console.log(alphaNum);
console.log([...chars, ...numerical])
console.log(alphaNum.join(','));