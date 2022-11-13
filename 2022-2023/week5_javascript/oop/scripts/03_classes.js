function Cat(type) {
    this.type = type;
}
Cat.prototype.speak = function (line) {
    console.log(`The ${this.type} cat says '${line}'`);
};

// If you put the keyword new in front of a function call, the function is treated as a constructor
let ariel = new Cat("Caracal");

ariel.speak('meow');

console.log(Object.getPrototypeOf(Cat) == Function.prototype); // -> true
console.log(Object.getPrototypeOf(ariel) == Cat.prototype); // -> true 

// So JavaScript classes are constructor functions with a prototype property

class Dog {
    constructor(type) {
        this.type = type;
    }

    bark() {
        console.log(`The ${this.type} dog is barking`);
    }
}

let shepherd = new Dog("shepherd");
let black = new Dog("black");
/**
class declaration is equivalent to the constructor
definition from the above just nicer
 */


class Color {
    // private field
    // We don't need keywords like let, const, or var to declare fields
    #values;
    static nrOfObjects = 0;
    constructor(r, g, b) {
        this.#values = [r, g, b];
        Color.nrOfObjects++;
    }
    // Accessor fields allow us to manipulate something as if its an "actual property"
    // you can use getRed() or setRed(red) (MDN says they're unergonomic in JavaScript)
    get red() {
        return this.#values[0];
    }
    set red(value) {
        this.#values[0] = value;
    }
    // methods can be private as well
    #toHSL() {
        // …
    }

    // static properties: fields, methods, getters, and setters
    // they are not accessible from instances
    static isValid(r, g, b) {
        return r >= 0 && r <= 255 && g >= 0 && g <= 255 && b >= 0 && b <= 255;
    }
}

const c1 = new Color(255, 0, 0);
console.log(c1.red); // 255
c1.red = 245
console.log(c1.red);

const c2 = new Color(0, 0, 0);
console.log(`Nr of color objects ${Color.nrOfObjects}`);