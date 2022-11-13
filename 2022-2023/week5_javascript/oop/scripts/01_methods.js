const speak = function(line) {
    console.log(`The ${this.color} cat says '${line}'`);
};


const whiteCat = {color: 'white', speak};
const orangeCat = {color: 'orange', speak};

whiteCat.speak('meow');
orangeCat.speak('hiss');

/*
If you want to pass it explicitly, you can use a function’s call method,
which takes the this value as its first argument and treats further arguments
as normal parameters
*/

speak.call(whiteCat, 'meow');