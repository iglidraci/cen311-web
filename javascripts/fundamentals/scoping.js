'use strict'
const firstName = "igli";
const first = function() {
    console.log(firstName);
    function second() {
        const age = 23;
        console.log(firstName + " is " + age + " years old");
    }
    second();
}
first();
third();

function third() {
    console.log("third function call");
}