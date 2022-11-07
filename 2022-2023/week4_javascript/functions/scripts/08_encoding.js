const TRUE = x => y => x;

const FALSE = x => y => y;

const NOT = x => x(FALSE)(TRUE);

const AND = x => y => x(y)(x);
// const AND = x => y => x(y)(FALSE);

const OR = x => y => x(x)(y)
// const OR = x => y => x(TRUE)(y)

// truth table for not operator
console.log(NOT(TRUE) === FALSE);
console.log(NOT(FALSE) === TRUE);

// truth table for and
console.log(AND(TRUE)(FALSE) === FALSE);
console.log(AND(TRUE)(TRUE) === TRUE);
console.log(AND(FALSE)(TRUE) === FALSE);
console.log(AND(FALSE)(FALSE) === FALSE);

// truth table for or
console.log(OR(TRUE)(FALSE) === TRUE);
console.log(OR(TRUE)(TRUE) === TRUE);
console.log(OR(FALSE)(TRUE) === TRUE);
console.log(OR(FALSE)(FALSE) === FALSE);