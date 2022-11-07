const arr = [1, 2, 3, 4 , 5];

// array deconstruction
const [x, y, z] = arr;

console.log(x); // -> 1
console.log(y); // -> 2
console.log(z); // Output?

let [a, , b] = arr;
console.log(a, b); // -> 1 3

// swap variables
[a, b] = [b, a];
console.log(a, b);

const person = {
    firstName: 'bob',
    age: 23,
    job: 'developer'
}

// object deconstruction
const {firstName, age, job} = person;

console.log(firstName, age, job);

const obj1 = {
    a: 'a',
    b: 'b'
}

const obj2 = {
    [a]: 'a',
    [b]: 'b'
};

console.log(obj1, obj2);

const arr2 = [...arr, 'bob', ...'alice'];

console.log(arr2); // Output?

// rest parameters

function max(...numbers) {
    let result = -Infinity;
    for (let number of numbers) {
        if (number > result) result = number;
    }
    return result;
}
console.log(max(4, 1, 9, -2)); // → 9