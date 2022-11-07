Two special values, undefined and null denote the absence of a meaningful value.

There are differences between them, but they don't matter most of the time. Treat them interchangeable.

Undefined means a variable has been declared but has not yet been assigned a value

On the other hand, null is an object (accidentally though :D). It can be assigned to a variable as a representation of no value

Differences:

1) typeof
2) arithmetic (undefined will result in NaN whereas null will be converted to 0)
3) both are falsy values
3) undefined == null (true) and undefined === null (false);