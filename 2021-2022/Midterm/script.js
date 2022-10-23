'use scrict';
let test;
test += 1;
console.log(test);

const loadBtn = document.querySelector('#load-xml');
const outDiv = document.querySelector('#out');
const loadDiv = document.querySelector('#loading');
const table = document.querySelector('#table table');
const table2 = document.querySelector('#table2 table');
const tds = table.querySelectorAll('td');
const tds2 = table2.querySelectorAll('td');
const addBtn = document.querySelector('#add-btn');
const subBtn = document.querySelector('#sub-btn');
const mulBtn = document.querySelector('#mul-btn');
const calculatorOutput = document.querySelector('#calculator-output');


loadBtn.addEventListener('click', () => {
    const request = new XMLHttpRequest();
    request.open('GET', 'data.xml');
    request.send();
    request.onload = function () {
        buildTable(this); 
    }
    // request.addEventListener('load', function() {
    //     buildTable(this);
    // });
});

function byKey(key, obj) {
    return obj.getElementsByTagName(key)[0].firstChild.nodeValue;
}

const buildTable = (xml) => {
    const xmlResponse = xml.responseXML;
    let tableData = '<tr><th>Name</th><th>Capital</th><th>Density</th><th>Area</th><th>Population</th></tr>';
    const allCountries = xmlResponse.getElementsByTagName('country');
    const array = [...allCountries];
    array.sort((x, y) => {
        const density1 = byKey('density', x);
        const density2 = byKey('density', y);
        const area1 = byKey('area', x);
        const area2 = byKey('area', y);
        const pop1 = density1*area1;
        const pop2 = density2*area2;
        if (pop1 < pop2) return 1;
        if (pop1 > pop2) return -1;
        return 0;
    });

    for(let i=0; i < array.length; i++) {
        const name = byKey('name', array[i]);
        const capital = byKey('capital', array[i]);
        const density = byKey('density', array[i]);
        const area = byKey('area', array[i]);
        const population = formatPopulation(area*density);
        tableData += `<tr>
                        <td>${name}</td>
                        <td>${capital}</td>
                        <td>${density}</td>
                        <td>${area}</td>
                        <td>${population}</td>
                      </tr>`;
    }
    outDiv.innerHTML = `<table>${tableData}</table>`;
}

const formatPopulation = (population) => String(population).replace(/\B(?=(\d{3})+(?!\d))/g, ",");


const generator = document.querySelector('#generator');
const resultDiv = document.querySelector('#result');

generator.addEventListener('click', () => {
    const nr = randomIntBetween(1, 5);
    if (nr % 2 == 0)
        resultDiv.style = 'border: 4px solid red;'
    else
        resultDiv.style = 'border: 4px solid blue;'
    resultDiv.textContent = `Generated number is ${nr}`;
})

const randomIntBetween = (min, max) => {
    const value = Math.trunc(Math.random()*(max-min) + 1) + min;
    return value;
}

table.addEventListener('mouseover', (event) => {
    if (event.target.tagName.toLowerCase() === 'td') {
        tds.forEach(td => {
            if (td === event.target) {
                td.style.backgroundColor = getRandomColor();
            } else {
                td.style.backgroundColor = '';
            }
        });
    }
})

table2.addEventListener('mouseover', (event) => {
    if (event.target.tagName.toLowerCase() === 'td') {
        tds2.forEach(td => {
            if (td === event.target) {
                td.style.backgroundColor = '';
            } else {
                td.style.backgroundColor = getRandomColor();
            }
        });
    }
})

const getRandomColor = () => {
    const nr1 = randomIntBetween(0, 255);
    const nr2 = randomIntBetween(0, 255);
    const nr3 = randomIntBetween(0, 255);
    return `rgb(${nr1}, ${nr2}, ${nr3})`;
}

const getInput1 = () => +document.querySelector('#calculator-input1').value;
const getInput2 = () => +document.querySelector('#calculator-input2').value;

addBtn.addEventListener('click', () => {
    const in1 = getInput1();
    const in2 = getInput2();
    calculatorOutput.innerHTML = `${in1} + ${in2} = ${in1 + in2}`;
    calculatorOutput.style.border = '4px dotted red';
});

subBtn.addEventListener('click', () => {
    const in1 = getInput1();
    const in2 = getInput2();
    calculatorOutput.innerHTML = `${in1} - ${in2} = ${in1 - in2}`;
    calculatorOutput.style.border = '4px dotted green';
});

mulBtn.addEventListener('click', () => {
    const in1 = getInput1();
    const in2 = getInput2();
    calculatorOutput.innerHTML = `${in1} * ${in2} = ${in1 * in2}`;
    calculatorOutput.style.border = '4px dotted blue';
});


function $() {
    console.log('hello from $ function');
}

$();