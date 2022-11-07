/**
 * Can we abstract “doing something N times” as a function?
 */

const repeatLog = n => {
    for (let i = 0; i < n; i++) {
        console.log(i);
    }
}

repeatLog(10);

// what if we don't want to just log numbers

const repeat = (n, func) => {
    for(let i=0; i < n; i++)
        func(i);
};

repeat(3, console.log); // Output?

const labels = [];
repeat(4, x => labels.push(`Unit ${x+1}`));
console.log(labels);

/**
 * Functions that operate on other functions, either by taking them as arguments 
 * or by returning them, are called higher-order functions
 */

const greaterThan = n => m => m > n;

const greaterThan10 = greaterThan(10);

console.log(greaterThan10(20));

// new type of control flow

const unless = (predicate, then) => {
    if(!predicate) then();
}

repeat(5, n => {
    unless(n % 2 == 1, () => {
        console.log(`${n} is even`);
    });
});


/**
 * Filtering an array
 */


const filter = (array, predicate) => {
    let passed = [];
    for(let element of array)
        if (predicate(element))
            passed.push(element);
    return passed;
};

console.log(filter([1, 2, 3, 4], x => x % 2 == 1));

// filter function is not mutating the original array, is building-up a new one