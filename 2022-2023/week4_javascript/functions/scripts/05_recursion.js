/*
Consider this puzzle: by starting from the number 1 and repeatedly either
adding 5 or multiplying by 3, find a sequence of
such additions and multiplications that produces that number
*/

const findSolution = x => {
    const find = (current, expression) => {
        if (current == x) return expression;
        else if (current > x) return null;
        else return find(current + 5, `${expression} + 5`) ||
                    find(current * 3, `${expression} * 3`);
    }
    return find(1, '1') || "no solution";
}

console.log(findSolution(24));
console.log(findSolution(15));
console.log(findSolution(23));
console.log(findSolution(13));