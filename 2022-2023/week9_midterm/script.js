const btn = document.getElementById('btn');
const input = document.getElementById('input');
const result = document.getElementById('result');

result.addEventListener('mouseover', () => {
    result.style.color = randomColor();
});

result.addEventListener('mouseout', () => {
    result.style.color = 'black';
})

function randomColor() {
    const r = Math.trunc(Math.random() * 255) + 1;
    const g = Math.trunc(Math.random() * 255) + 1;
    const b = Math.trunc(Math.random() * 255) + 1;
    return `rgb(${r}, ${g}, ${b})`;
}

btn.addEventListener('click', () => {
    const nr = input.value;
    const fib = fibonacci(+nr, 0, 1);
    result.innerText = `Fibonacci number is: ${fib}`;
})

function fibonacci2(nr) {
    // 0, 1, 1, 2, 3, 5
    if (nr === 0 || nr === 1)
        return nr;
    else return fibonacci2(nr-1) + fibonacci2(nr-2);
} 

function fibonacci(nr, first, second) {
    if (nr == 0) {
        return first;
    } else if (nr == 1) {
        return second;
    } else {
        return fibonacci(nr - 1, second, first + second);
    }
}