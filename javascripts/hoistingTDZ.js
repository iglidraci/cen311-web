console.log(firstName);
// console.log(age);

var firstName = "igli";
let age = 23;
const job = "developer";

console.log(addDec(1, 2));
// console.log(addExp(1, 2));

function addDec(a, b) {
    return a + b;
}

const addExp = function(a, b) {
    return a + b;
}

// because of hoisting, it will be initialized as undefined and we try to call it
// var addExp = function(a, b) {
//     return a + b;
// }

const addLambda = (a, b) => a+b;

var x = 1;
let y = 2;
const z = 3;