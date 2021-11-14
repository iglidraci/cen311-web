const footer = document.querySelector('.footer');

document.querySelector('.change-color').addEventListener(
    'click', () => {
        footer.style.backgroundColor = 'yellow';
        footer.style.color = 'black';
    }
);
// only the inline styles
console.log(footer.style.backgroundColor);

console.log(getComputedStyle(footer).backgroundColor);

document.documentElement.style.setProperty(
    '--color-primary', 'blue'
);

// attributes
const img = document.querySelector('.logo');
document.querySelector('.change-img').addEventListener(
    'click', () => {
        // use getAttributes so that you don't get the absolute path
        // img.src will give you the absolute path
        if (img.getAttribute('src') === 'images/img2.png')
            img.src = 'images/img1.png'
        else
            img.src = 'images/img2.png'
    }
);
// data attributes
// special attributes are stored in dataset

console.log(img.dataset.sthSpecial);

// classes
img.classList.add('test');
img.classList.remove('test');
img.classList.add('test');
