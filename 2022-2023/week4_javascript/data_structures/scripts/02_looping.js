const accountMovements = [200, -100, 200, -50, -150, 250];

for (let i = 0; i < accountMovements.length; i++) {
    console.log(accountMovements[i]);
}

// forEach is a higher order function, takes another function
accountMovements.forEach(x => {
    if (x>0) console.log(`you deposited ${x}`);
    else console.log(`you withdrew ${-x}`);
});

// can also get the current index
accountMovements.forEach((x, index) => {
    if (x>0)
        console.log(`in transaction ${index+1}, you deposited ${x}`);
    else
        console.log(`in transaction ${index+1}, you withdrew ${-x}`);
})


const arr = [3, 5, 7];
arr.foo = 'hello';

for (const i in arr) {
    console.log(i);
}
// -> "0" "1" "2" "foo"

// it will loop over the elements of the value given after of
for (const i of arr) {
    console.log(i);
}
// -> 3 5 7