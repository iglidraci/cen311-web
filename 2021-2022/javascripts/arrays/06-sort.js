'use strict';

const movements = [200, -100, 200, -50, -150, 250];

console.log(movements.sort());

// if return > 0  => B, A
// if return < 0 => A, B

// call slice to get a copy and not mutate the orignal array
movements.slice().sort((a, b) => a-b);

console.log(movements);