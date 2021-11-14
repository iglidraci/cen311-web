const arr = [1, 2, 3, 4 , 5];

const [x, y, z] = arr;

console.log(x);
console.log(y);
console.log(z);

let [a, , b] = arr;
console.log(a, b);

// swap variables
[a, b] = [b, a];
console.log(a, b);

const person = {
    firstName: 'bob',
    age: 23,
    job: 'developer'
}

const {firstName, age, job} = person;

console.log(firstName, age, job);

const obj = {
    a: 'a',
    b: 'b'
}

const obj1 = {
    [a]: 'a',
    [b]: 'b'
};

console.log(obj, obj1);

const arr2 = [...arr, 'bob', ...'alice'];

console.log(arr2);