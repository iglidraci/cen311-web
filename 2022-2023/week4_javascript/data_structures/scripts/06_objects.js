let day1 = {
    squirrel: false,
    events: ["work", "touched tree", "pizza", "running"]
};

console.log(day1.squirrel);
// → false

// Reading a property that doesn’t exist will give you the value undefined
console.log(day1.wolf);
// → undefined
day1.wolf = false;
console.log(day1.wolf);
// → false

console.log(day1);


// Properties whose names aren’t valid binding names or valid numbers have to be quoted

let book1 = {
    title: 'Foo',
    'first author': 'Bar' 
};

console.log(book1);

/**
 * Unary operator delete and binary operator in
 */

delete book1["first author"];
console.log('first author' in book1);
console.log('title' in book1);

console.log(Object.keys({x: 0, y: 0, z: 2})); // -> ["x", "y", "z"]

let objectA = {a: 1, b: 2};
Object.assign(objectA, {b: 3, c: 4});
console.log(objectA);
// → {a: 1, b: 3, c: 4}

/**
 * Mutability
 */

const score = {visitors: 0, home: 0};
// This is okay
score.visitors = 1;
// This isn't allowed
// score = {visitors: 1, home: 1};
