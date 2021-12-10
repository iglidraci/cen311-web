'use strict';

const loadBtn = document.querySelector('#load-xml');
const spinner = document.querySelector('#spinner');
const outputDiv = document.querySelector('#output-div');

const isLoading = () => {
    spinner.classList.remove('hide');
}

const stopLoading = () => {
    spinner.classList.add('hide');
}

loadBtn.addEventListener('click', () => {
    isLoading();
    // suppose we have to wait 2 seconds before we get the response (server time)
    try{
        setTimeout(loadXml, 0);
    } catch(ex) {
        console.log(ex);
        stopLoading();
    }
})

const loadXml = () => {
    const request = new XMLHttpRequest();
    request.open('GET', 'data/cd_catalog.xml');
    request.send();
    request.addEventListener('load', function() {
        buildTable(this);
        stopLoading();
    });
    
};

const buildTable = (xml) => {
    const xmlResponse = xml.responseXML;
    let tableData = '<tr><th>Title</th><th>Artist</th><th>Year</th><th>Price</th></tr>';
    const allCDs = xmlResponse.getElementsByTagName('CD');
    for(let i=0; i < allCDs.length; i++) {
        tableData += `<tr>
                        <td>${allCDs[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue}</td>
                        <td>${allCDs[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue}</td>
                        <td>${allCDs[i].getElementsByTagName("YEAR")[0].childNodes[0].nodeValue}</td>
                        <td>${allCDs[i].getElementsByTagName("PRICE")[0].childNodes[0].nodeValue}</td>
                      </tr>`;
    }
    outputDiv.innerHTML = `<table>${tableData}</table>`;
}