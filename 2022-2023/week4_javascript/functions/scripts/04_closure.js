/*
Closure
1)Treating functions as values and 2) re-creating local variables every time
we call a function, brings up the question => what happens to local variables
when the function that created them is no lonnger active? 
*/
const wrap = n => {
    let local = n;
    return () => local;
}
let wrap1 = wrap(1);
let wrap2 = wrap(2);
console.log(wrap1());
console.log(wrap2());
/*
Being able to reference a specific instance of a local binding in
an enclosing scope—is called closure
*/
// curried version of add
const add = (a) => {
    return (b) => a + b;
}
let addToTen = add(10);
console.log(addToTen(20));

// trophies
const winTrophies = function() {
    let nrOfTrophies = 0;
    return function() {
        nrOfTrophies++;
        console.log(`nr of trophies ${nrOfTrophies}`);
    }
}

const winWorldCup = winTrophies();

winWorldCup();
winWorldCup();
winWorldCup();



/*
even though winTrophies gets popped from the execution stack,
winWorldCup still has access
closures: a function always has access to the environment variables 
of the execution context it was created on even if that execution context 
is popped of the stack
*/

let f;

const g = function() {
    const a = 23;
    f = function () {
        console.log(a*2);
    }
}

const h = function() {
    const b = 10;
    f = function () {
        console.log(b*2);
    }
}

g();

f();

h();

f();


/*
The method console.dir() displays an interactive list of the properties 
of the specified JavaScript object
*/
console.dir(f);