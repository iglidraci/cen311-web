// include 06_iterator.js first then this file
// obviously there's a better way to do this (export and import)

class SymmetricMatrix extends Matrix {
    constructor(size, elementInitiator = (x, y) => null) {
        super(size, size, (x, y) => {
            if (x < y) return elementInitiator(y, x);
            else return elementInitiator(x, y);
        });
    }
    set(x, y, value) {
        super.set(x, y, value);
        super.set(y, x, value);
    }
}

const symMatrix = new SymmetricMatrix(4, (x, y) => `${x},${y}`);

console.log(symMatrix.get(2, 3)); // Output?

console.log(symMatrix instanceof SymmetricMatrix);
console.log(symMatrix instanceof Matrix);
console.log(new Matrix(2, 2) instanceof SymmetricMatrix);
console.log(new Matrix(2, 2) instanceof Matrix);