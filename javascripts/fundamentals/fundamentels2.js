'use strict';

const calcAge = function (birthYear) {
    return 2021 - birthYear;
}

const calcAge2 = (birthYear) => {
    console.log("hello world");
    return 2021 - birthYear;
};

console.log(calcAge(1998));
console.log(calcAge2(1998));

const array = [1, 2, 3, 4];

const array2 = new Array(2, 3, 4);
console.log(array2);
array.push(5); // insert last
array.unshift(7); // insert first


array.pop(); // remove the last

array.shift(); // remove the first

console.log(array.indexOf(3));
const inArray = array.includes(3);
console.log(inArray);

const me = {
    firstName: 'Igli',
    lastName: 'Draci',
    age: 23,
    friends: ["Lezo", "Boli", "Mili"],
    calcBirthYear: function() {
        console.log(this);
        return 2021 - this.age;
    },
    getSummary: function() {
        return `This is ${this.firstName} ${this.lastName}, born in ${this.calcBirthYear()},
                his hobby is ${this.hobby}`;
    }
};

console.log(me.age);
me.hobby = "mma";
me['facebook'] = true;
console.log(me);
console.log(me.calcBirthYear());
console.log(me.getSummary());

array.forEach(element => {
    console.log(element)
});

const newArray = array.map(x => x*x);
console.log(newArray);
