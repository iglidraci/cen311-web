'use strict';
// var variables are hoisted to the top 
// of their scope and initialized with a value of undefined

console.log(`first name is ${firstName}`);

var firstName = 'Alice';


// console.log(age);

// this is a problem that you might occure with var
var position = 'junior';

var workingYears = 20;

if (workingYears > 5) {
    var position = 'senior';
}

console.log(`position is ${position}`);


// let is block scoped
// a variable declared in a block with let 
// is only available within that block

// let's resolve the problem above

let greeting = 'good morning';
let hour = 16;
if (hour > 12){
    let greeting = 'good afternoon';
}
console.log(greeting);

// like var, let can be updated within its scope
// unlike var, let can't be redeclared in the same scope
// hoisting of let
// if you try to use a let variable before declaration => Reference Error


const person1 = {
    name: 'John',
    age: 30,
    sayHello: function() {
        console.log(`${this.name}, ${this.age} years old says hello`);
    }
}

// const cannot be updated or re-declared

person1.sayHello();

person1.name = 'Jim';
person1.sayHello();

// this below will give an error Assignment to constant variable.
// person1 = 'hello';

// differences

/**
 * They are all hoisted to the top of their scope.
 * var variables are initialized with undefined
 * let and const variables are not initialized
 */