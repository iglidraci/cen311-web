const secureBooking = function() {
    let nrBooking = 0;
    return function() {
        nrBooking++;
        console.log("nr of booking " + nrBooking);
    }
}

// even though secureBooking gets poped from the execution stack,
// booker still has access


/*
closures: a function always has access to the environment variables 
of the execution context it was created on even if that execution context 
is popped of the stack
*/
const booker = secureBooking();

booker();
booker();
booker();

console.dir(booker);

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

console.dir(f);

// closure detected
const boardPassangers = function(n, wait) {
    const perGroup = n/3;
    setTimeout(() => {
        console.log("we are now boarding " + n + " passangers");
        console.log("there are 3 groups each with " + perGroup);
    }, wait*1000);
    // this will be called immediatly, it's not waiting for timeout
    console.log("will start boarding after " + wait + " seconds");
}

boardPassangers(180, 3);