'use strict'
const str = "Wizz Air 2000"
console.log(str.length);
const arr = [1, 2, 3, 4]

console.log(str.indexOf('Wizz'));
console.log(str.slice(0, 3));

console.log(str.slice(1, -1));
const fullName = 'iGLi DRAcI';

const refactorName = fullName[0].toUpperCase() + fullName.slice(1).toLowerCase();

console.log(refactorName);

const email = 'idraci@epoka.edu.al';

// const loginEmail = prompt("Enter you email");

const loginEmail = '   IDRaci@epoKA.EDU.AL';

const normalizedEmail = loginEmail.toLowerCase().trim();

if(email === normalizedEmail){
    console.log("logged in successfully");
} else {
    console.log("login failed");
}

// replacing strings

const priceGB = '256,67£';
const priceUS = priceGB.replace('£', '$').replace(',', '.');

console.log(priceUS);

const british = "Do I look like a bloke that messages another bloke?!";

const us = british.replace(/bloke/g, 'guy');

console.log(us);

console.log(british.includes('bloke'));
console.log(us.includes('bloke'));

const startsWith = 'Do I look';
const endsWith = '?!';
console.log(british.startsWith(startsWith) && us.startsWith(startsWith));
console.log(british.endsWith(endsWith) && us.endsWith(endsWith));


// split
const longStr = "This+is+Sparta";
console.log(longStr);
console.log(longStr.split('+'));
console.log(longStr.split('+').join(' '));

const badName = 'iglI aDEm FADil DRaci';
// refactor the name so that every part of your name is capitalize and
// last name is all UPPER

const refactorFunc = (str) => {
    const splitted = str.split(' ');
    let refactorName = splitted.slice(0, -1)
                    .map(x => x[0].toUpperCase() + x.slice(1).toLowerCase())
                    .join(' ');
    refactorName += ` ${splitted[splitted.length - 1].toUpperCase()}`;
    return refactorName;
}

console.log(refactorFunc(badName));

// padding

const team = 'Inter';

console.log(team.padStart(10, '+').padEnd(15, 'He'));

const padCreditCard = (number) => {
    const str = new String(number);
    return str.slice(-4).padStart(16, '*');
}

console.log(padCreditCard('1234123412345678'));