'use strict';


/**
 * forEach method
 */

 const accountMovements = [200, -100, 200, -50, -150, 250];

 // forEach is a high order function, takes another function
 accountMovements.forEach(x => {
     if (x>0)
         console.log(`you deposited ${x}`);
     else
         console.log(`you withdrew ${-x}`);
 });
 // can also get the current index
 accountMovements.forEach((x, index) => {
     if (x>0)
         console.log(`movement ${index+1}, you deposited ${x}`);
     else
         console.log(`movement ${index+1}, you withdrew ${-x}`);
 })


 // with Map
 const states = new Map([
     ['USA', 'United States of America'],
     ['GB', 'Great Britan'],
     ['AL', 'Albania']
 ]);
 console.log(states);

 states.forEach((value, key) => {
     console.log(`value=${value}`);
     console.log(`key=${key}`);
 })

 // with Set

 const continents = new Set(['Europa', 'Asia', 'Africa', 'Europa']);
 continents.forEach(x => console.log(x));
