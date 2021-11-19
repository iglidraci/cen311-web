'use strict';

const btn = document.querySelector('.btn-country');
const countriesContainer = document.querySelector('.countries');
const spinner = document.querySelector('#spinner');


// old school

const renderData = function(data) {
    const html = `
            <article class="country">
              <img class="country__img" src="${data.flags.png}" />
              <div class="country__data">
                <h3 class="country__name">${data.name.common}</h3>
                <h4 class="country__region">${data.region}</h4>
                <p class="country__row"><span>👫</span>
                ${(+data.population/1000000).toFixed(1)}
                </p>
                <p class="country__row"><span>🗣️</span>${Object.values(data.languages)[0]}</p>
                <p class="country__row"><span>💰</span>
                    ${Object.values(data.currencies)[0].name}
                </p>
              </div>
            </article>
        `
    countriesContainer.insertAdjacentHTML('beforeend', html);
    countriesContainer.style.opacity = 1;
}

const getCountryByCode = function(countryCode) {
    const request = new XMLHttpRequest();

    request.open('GET', `https://restcountries.com/v3.1/alpha/${countryCode}`);
    request.send();
    request.addEventListener('load', function() {
        // json data
        const [data] = JSON.parse(this.responseText);
        console.log(data);
        renderData(data);
    });
}

const getCountryAndBorders = function(countryName) {
    const request = new XMLHttpRequest();

    request.open('GET', `https://restcountries.com/v3.1/name/${countryName}`);
    request.send();
    // fetch the data in background
    // wait for on load
    
    request.addEventListener('load', function() {
        // json data
        const [data] = JSON.parse(this.responseText);
        console.log(data);
        renderData(data);
        // get neighbours country
        const neighbours = data.borders;
        neighbours.forEach(getCountryByCode);
    });
};

const handleError = (message) => {
    countriesContainer.insertAdjacentText('beforeend', message);
    countriesContainer.style.opacity = 1;
}
 

// getCountryAndBorders('ukraine');

// modern way of making ajax calls

// build the promise
const requestCountryData = (countryName) => {
    spinner.classList.remove('hide');
    fetch(`https://restcountries.com/v3.1/name/${countryName}`)
    .then(response => response.json())
    .then(data => {
        const [country] = data;
        renderData(country);
        const neighbours = country.borders;
        // let's render only the first neighbour
        return fetch(`https://restcountries.com/v3.1/alpha/${neighbours[0]}`);
    })
    .then(neighbourResponse => neighbourResponse.json())
    .then(neighbour => renderData(neighbour[0]))
    .catch(error => {
        console.error(error);
        handleError(error.message);
    })
    .finally(() => spinner.classList.add('hide'));
    // then always returns a promise
    // finally will always execute whether there's an error or not
};

// What is a promise
// object that is used as a placeholder for future result of an AJAX call
requestCountryData('france');


btn.addEventListener('click', () => requestCountryData('ukraine'));

// event loop

console.log('hello world');
setTimeout(() => console.log("Hello from time out"), 0);
Promise.resolve('Resolved promise')
        .then(console.log);
// timer and promise will finish after 0 sec at the same time
// which will be executed first
// promosies do not go to the callback queue but to microtasks queue
// microtasks queue have priority from the callback queue
// microtask queue have only callbacks for promosies
console.log("end")
