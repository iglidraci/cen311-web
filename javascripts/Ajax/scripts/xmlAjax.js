'use strict';
const cdButton = document.querySelector('#cd-loader');

cdButton.addEventListener('click', () => {
    const request = new XMLHttpRequest();
    request.open('GET', 'data/cd_catalog.xml');
    request.send();
    request.addEventListener('load', function(){
        const xmlDoc = this.responseXML;
        createTable(xmlDoc);
    })
});

const createTable = (xmlDoc) => {
    let table="<tr><th>Title</th><th>Artist</th></tr>";
    const cds = xmlDoc.getElementsByTagName("CD");
    for (let i = 0; i <xmlDoc.length; i++) {
        table += "<tr><td>" +
        cds[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
        "</td><td>" +
        cds[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
        "</td></tr>";
      }
      document.getElementById("demo-xml").innerHTML = table;
}