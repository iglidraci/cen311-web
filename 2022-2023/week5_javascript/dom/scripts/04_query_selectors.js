/**
 * querySelectorAll method takes a selector string an returns a NodeList containing
 * all the elements that match the string.
 * The object returned is not live, won't change when the document changes
 * Not a real array, if you want to make use of array methods call Array.from
 */

const count = (selector) => document.querySelectorAll(selector).length;


console.log(`<p> elements count: ${count("p")}`);
console.log(`elements with class animal: ${count(".animal")}`);
console.log(`paragraphs with class animal: ${count("p .animal")}`);

/**
 * The querySelector works in a similar way but returns one element only (first if there are multiple matches)
 */