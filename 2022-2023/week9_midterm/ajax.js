const btn = document.getElementById('load-btn');
const outputDiv = document.getElementById('output');

btn.addEventListener('click', () => {
    outputDiv.innerHTML = '<p style="color: darkred">Loading data ...</p>';
    // spinner
    const request = new XMLHttpRequest();
    request.open('GET', 'data.json');
    request.addEventListener('load', function() {
        setTimeout(() => {
            const json = this.responseText; // string
            const data = JSON.parse(json);
            displayTable(data);
        }, 1000);
    });
    request.send();
});

function displayTable(data) {
    // [1, 2, 3] map(x => x*x) -> [1, 4, 9] 
    const newData = data.map(x => {
        const area = x.area.split(' ')[0].replaceAll(',', '');
        const population = x.population;
        const density = population/area;
        return {
            ...x,
            density
        }
    });
    newData.sort((a, b) => b.density - a.density);
    let tableData = `<thead><tr>
                        <th>Country</th><th>Code</th>
                        <th>Area</th><th>Population</th>
                        <th>Density</th></tr>
                    </thead>
                    <tbody>
                    `;
    console.log(newData);
    for (const country of newData) {
        tableData += `
                <tr>
                    <td>${country.name}</td>
                    <td>${country.code}</td>
                    <td>${country.area}</td>
                    <td>${(country.population/1_000_000).toFixed(1)} mln</td>
                    <td>${(country.density).toFixed(1)} per km2</td>
                </tr>
        `;
    }
    outputDiv.innerHTML = `<table>${tableData}</tbody></table>`;
}