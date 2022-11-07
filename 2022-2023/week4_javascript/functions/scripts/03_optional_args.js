/*
Optional arguments
If you pass more arguments, JS will ignore the extra arguments
If you pass too few, missing parameters get assigned the value undefined
*/
const bar = (greeting) => {
    console.log(greeting);
};
const baz = (name, greeting) => {
    console.log(`${name} says ${greeting}`);
};
const thud = (name, greeting='hello') => {
    console.log(`${name} says ${greeting}`);
};
bar('hello', 'Ivan');
baz('Ivan');
thud('Ivan');
// Don't worry, we'll see how to pass var-length arguments