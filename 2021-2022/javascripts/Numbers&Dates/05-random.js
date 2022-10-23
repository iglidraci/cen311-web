const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}
const displayDiv = document.querySelector('#display');
document.querySelector('#generate-button').addEventListener(
    'click', () => {
        const p = document.createElement('p');
        p.textContent = randomIntBetween(1, 10);
        displayDiv.appendChild(p);
    }
)