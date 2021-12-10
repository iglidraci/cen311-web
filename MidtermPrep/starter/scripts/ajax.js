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
    setTimeout(loadXml, 0);
    
})

const loadXml = () => {
    // create xml http request object
    // open a request
    // send it
    // listen to load event
        // call buildTable() function
};

const buildTable = (xml) => {
    // build the table
}