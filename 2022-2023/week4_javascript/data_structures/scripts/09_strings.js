let foo = "Foo";
console.log(foo.length);
console.log(foo.toUpperCase());
foo.id = 100;
console.log(foo.id); // → undefined

console.log("coconuts".slice(4, 7)); // → nut
console.log("coconut".indexOf("u")); // → 5
console.log(" okay \n ".trim()); // → okay
console.log(String(6).padStart(3, "0")); // → 006
let sentence = `One day, fed up with this pitiful existence, Jacques fails to change back into
his human form, hops through a crack in the circus tent, and vanishes into the forest`;
let words = sentence.split(" ");
console.log(words);
console.log("LA".repeat(3)); // → LALALA
console.log("LA"[1]); // → A

// replacing strings

const priceGB = '256,67£';
const priceUS = priceGB.replace('£', '$').replace(',', '.');
console.log(priceUS);

const badName = 'guIDo vAn roSSuM';
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