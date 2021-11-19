'use strict';

const table = document.getElementById('dataTable');
const tbody = table.querySelector('tbody');
const rows = tbody.querySelectorAll('tr');
console.log(rows.length, rows);


// const tryToParse = (value) => {
//     const maybe = +value;
//     return maybe ? maybe : value;
// }



const sortWithKey = (array, key, asc=true) => {
    return array.sort((a, b) => {
        const x = a.children[key].textContent;
        const y = b.children[key].textContent;
        if (asc)
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        else
            return ((x < y) ? 1 : ((x > y) ? -1 : 0));
    });
}

const changeTable = (columnIndex, asc) => {
    const rowsList = [...rows];
    const sortedRows = sortWithKey(rowsList.slice(), columnIndex, asc);
    const newTableBody = document.createElement('tbody');
    sortedRows.forEach(element => {
        newTableBody.appendChild(element);
    });
    table.appendChild(newTableBody);
    tbody.remove();
}

const sortAscending = [false, false, false, false]

document.querySelector('thead').addEventListener(
    'click', (event) => {
        let index = 0;
        const column = event.target.textContent;
        switch (column) {
            case 'Company':
                index = 0;
                break;
            case 'Contact':
                index = 1;
                break;
            case 'Country':
                index = 2;    
                break;
            case 'Salary':
                index = 3;
                break;
        }
        sortAscending[index] = !sortAscending[index];
        changeTable(index, sortAscending[index]);
    }
)