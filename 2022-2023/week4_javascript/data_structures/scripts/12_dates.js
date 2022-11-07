/**
 * JavaScript Date objects represent a single moment in time
 * in a platform-independent format
 */

// 4 ways of creating dates

console.log(new Date());
console.log(new Date("November 01 1918"));

console.log(new Date(2021, 11, 15, 20, 20, 20));

console.log(new Date(0));

const sinceUnix = new Date(0);

console.log(sinceUnix.getFullYear());
console.log(sinceUnix.getMonth());

console.log(sinceUnix.getDay());

console.log(sinceUnix.getTime());

// operations with dates

const differenceInDays = (date1, date2) => Math.abs(date1-date2) / (24*60*60*1000);

const differenceInYears = (date1, date2) => differenceInDays(date1, date2)/365;

const now = new Date();
console.log(differenceInDays(now, sinceUnix));

console.log(differenceInYears(now, sinceUnix));