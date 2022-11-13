/**
 * Generator functions allow you to define an iterative algorithm
 * by writing a single function whose execution is not continuous
 */

function* simpleGen() {
    yield 1;
    yield 2;
}

const it = simpleGen();

for (const itItem of it) {
    console.log(itItem);
}

function* range(start=0, end=Infinity, step=1) {
    let iterationCount = 0;
    for (let i = start; i < end; i += step) {
        iterationCount++;
        yield i;
    }
    return iterationCount;
}

const smallRange = range(0, 10);

for (const element of smallRange) {
    console.log(element);
}

/**
 * The object given to a for/of loop is expected to be iterable
 * Iterator is the interface that does the actual iteration
 * Symbol.iterator symbol defined by the language
 * It has next (a method), value (the next value) and done (true when no more results)
 */

let fooIterator = "Foo"[Symbol.iterator]();
console.log(fooIterator.next()); // → {value: "F", done: false}
console.log(fooIterator.next()); // → {value: "o", done: false}
console.log(fooIterator.next()); // → {value: "o", done: false}
console.log(fooIterator.next()); // → {value: undefined, done: true}

/**
 * Matrix acting as a 2d array
 */

class Matrix {
    #content;
    constructor(rows, columns, elementInitiator = (x, y) => null) {
        this.rows = rows;
        this.columns = columns;
        this.#content = [];
        for (let i = 0; i < rows; i++){
            for (let j = 0; j < columns; j++)
                this.#content[i*rows + j] = elementInitiator(i, j);
        }
    }

    get(x, y) {
        return this.#content[y*this.rows + x];
    }
    
    set(x, y, value) {
        this.#content[y*this.rows + x] = value;
    }
} 

/**
 * We'll have our iterator produce objects with x, y, and value properties
 */

class MatrixIterator {
    constructor(matrix) {
        this.x = 0;
        this.y = 0;
        this.matrix = matrix; 
    }

    next() {
        if (this.y == this.matrix.rows) return {done: true};
        let value = {
            x: this.x, y: this.y, value: this.matrix.get(this.x, this.y)
        };
        this.x++;
        if (this.x == this.matrix.columns) {
            this.x = 0;
            this.y++;
        }
        return {value, done: false};
    }
}

// set up the Matrix class to be iterable
Matrix.prototype[Symbol.iterator] = function() {
    return new MatrixIterator(this);
};

const matrix = new Matrix(4, 4, (x, y) => x == y ? 1 : 0);

for (const element of matrix) {
    console.log(element);
}