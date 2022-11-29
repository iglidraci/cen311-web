/**
 * Same file as 03_ajax.js
 */

const BASE_URL = 'https://api.itbook.store/1.0/';

const spinner = document.getElementById('spinner');
const loadBtn = document.getElementById('btn-load');
const container = document.getElementById('result-container');
const searchBtn = document.getElementById('search-btn');
const searchInput = document.getElementById('search-input');

const startSpinner = function() {
    spinner.style.display = 'block';
}

const stopSpinner = function() {
    spinner.style.display = 'none';
}

const handleErrors = function() {
    stopSpinner();
    container.innerHTML = `
        <div class="alert alert-danger" role="alert">
            An error occurred.
        </div>`;
}
