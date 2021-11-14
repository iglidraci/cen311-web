
'use strict';
let firstTime = true;
let firstNumber;
let secondNumber;

const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}

document.querySelector('#generate').addEventListener(
    'click', () => {
        if (firstTime) {
            firstNumber = randomIntBetween(1, 50);
            secondNumber = randomIntBetween(1, 50);
            console.log(`first number is ${firstNumber}`);
            console.log(`second number is ${secondNumber}`);
            firstTime = false;
        }
            
    }
);

const setInfoParagraph = (text) => document.querySelector('#info').textContent = text;

let hintOrder = 1;

document.querySelector('#hint').addEventListener(
    'click', () => {
        if (firstNumber && secondNumber) {
            let result;
            switch (hintOrder%4) {
                case 1:
                    result = `Sum is ${firstNumber+secondNumber}`;
                    break;
                case 2:
                    result = `Difference is ${firstNumber-secondNumber}`;
                    break;
                case 3:
                    result = `Product is ${firstNumber*secondNumber}`;
                    break;
                case 0:
                    result = `Quotient is ${firstNumber%secondNumber}`;
                    break;
            }
            hintOrder++;
            setInfoParagraph(result);
        } else {
            alert('generate numbers first then click hint');
        }
    }
);

document.querySelector('#check').addEventListener(
    'click', () => {
        if (firstNumber && secondNumber){
            const input1 = +document.querySelector('#input1').value;
            const input2 = +document.querySelector('#input2').value;
            if (input1===firstNumber && input2===secondNumber){
                setInfoParagraph('you won');
            } else {
                setInfoParagraph('you lost');
            }
        }
        else {
            alert('click generate button first then check!');
        }
    }
);

document.querySelector('#reset').addEventListener(
    'click', () => {
        firstTime = true;
        firstNumber = null;
        secondNumber = null;
        hintOrder = 1;
        setInfoParagraph('');
        document.querySelector('#input1').value = '';
        document.querySelector('#input2').value = '';
    }
);