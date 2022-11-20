const outDiv = document.getElementById('countries-table');

const spinner = document.getElementById('spinner');

const byKey = function (key, obj) {
    return obj.getElementsByTagName(key)[0].firstChild.nodeValue;
}

const buildTable = (xmlResponse) => {
    let tableData = '<thead><tr><th>Name</th><th>Code</th><th>Capital</th><th>Population</th></tr></thead><tbody>';
    const allCountries = xmlResponse.getElementsByTagName('country');
    const array = [...allCountries].map(x => {
        const population = byKey('area', x) * byKey('density', x); // no need to cast them
        return {
            name: byKey('name', x),
            capital: byKey('capital', x),
            code: x.getAttribute('code'),
            population
        }
    });
    array.sort((x, y) => y.population - x.population);
    for (const country of array) {
            tableData += `
                    <tr>
                        <td>${country.name}</td>
                        <td>${country.code}</td>
                        <td>${country.capital}</td>
                        <td>${(country.population/1_000_000).toFixed(1)} mln</td>
                    </tr>
                    `;
    }
    outDiv.innerHTML = `<table class="table table-dark">${tableData}</tbody></table>`;
}

document.getElementById('load-xml').addEventListener('click', () => {
    spinner.style.display = 'block';
    const request = new XMLHttpRequest(); // create the XMLHttpRequest object

    request.open('GET', 'data/countries.xml'); // sets the request method and URL

    // suppose loading data is taking time
    setTimeout(() => {
        request.send();
    }, 500);

    request.addEventListener('load', function () { // wait for load event and handle it 
        buildTable(this.responseXML);
        spinner.style.display = 'none';
    });

})

