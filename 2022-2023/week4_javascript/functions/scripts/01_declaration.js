const square = function(x) {
    return x*x;
};
console.log(square(12));
let x = 10;
if (true) {
    let y = 20;
    var z = 30;
    console.log(x + y + z); // → 60
}
// y is not visible here
console.log(x + z); // → 40

/*
nested scopes
Each local scope can also see all the local scopes that contain it
All scopes can see the global scope (aka lexical scoping).
*/
const bakeCake = function(factor) {
    const ingredient = function(amount, unit, name) {
        let ingredientAmount = amount * factor;
        if (ingredientAmount > 1) {
            unit += "s";
        };
        console.log(`${ingredientAmount} ${unit} ${name}`);
    }
    ingredient(2, "unit", "egg");
    ingredient(3, "cup", "flour");
    ingredient(1, "cup", "butter");
};
bakeCake(2);

/*
function declaration
Function declarations are not part of the regular top-to-bottom
flow of control. They are moved to the top of their scope.
*/
console.log(`Foo says ${foo()}`);
function foo() {
    return 'nothing';
}

/*
Arrow functions
*/
const square1 = (x) => {
    return x*x;
};
const square2 = x => x*x;