// the backend URL, public API, no authentication needed
const BASE_URL = 'https://api.itbook.store/1.0';

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

const handleErrors = function(error) {
    container.innerHTML = `
                            <div class="alert alert-danger" role="alert">
                                An error occurred: ${error.message}
                            </div>
                            `
}

const fetchJSON = (url) => {
    return fetch(url).then(response => response.json());
}

const appendBook = function(book) {
    const html = `
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="${book.image}" alt="${book.title}">
        <div class="card-body">
            <h4 class="card-title">${book.title}</h4>
            <h5 class="card-title">${book.subtitle}</h5>
            <p class="card-text">${book.price}</p>
            <button class="btn btn-primary" data-isbn="${book.isbn13}">Show Details</button>
        </div>
    </div>
    `
    container.insertAdjacentHTML('beforeend', html);
}

const getNewReleases = function() {
    // Get new releases
    // [GET] https://api.itbook.store/1.0/new
    container.innerHTML = ''; // make sure to delete the current books from document
    startSpinner();
    fetchJSON(`${BASE_URL}/new`)
        .then(data => {
            for(const book of data.books)
                appendBook(book);
        })
        .catch(handleErrors)
        .finally(stopSpinner);
    /**
     * The Promise returned from fetch() won't reject on HTTP error status
     * even if the response is an HTTP 404 or 500.
     * It will resolve normally (with ok status set to false)
     * It will only reject on network failure or if anything prevented the request from completing.
     * You have to be careful how you handle the errors
     */
}

const displayDetails = function(book) {
    const html = `
    <div class="card border-success mb-3" >
        <div class="card-header">${book.title}</div>
        <img class="card-img-top" src="${book.image}" alt="${book.title}" style="max-width: 18rem;">
        <div class="card-body text-success">
            <h5 class="card-title">${book.subtitle}</h5>
            <h5 class="card-title">Author: ${book.authors}</h5>
            <p class="card-text">${book.desc}</p>
            <p class="card-text">Nr of pages: ${book.pages}</p>
            <p class="card-text">Language: ${book.language}</p>
            <p class="card-text">Price: ${book.price}</p>
            <a class="btn btn-primary" href="${book.pdf?.['Free eBook']}" target="_blank">Read</a>
        </div>
    </div>
    `
    container.insertAdjacentHTML('beforeend', html);
} 

// chaining promises
const getBookDetails = function(isbn13) {
    // Get book details by ISBN
    // /books/{isbn13}
    container.innerHTML = '';
    startSpinner();
    fetch(`${BASE_URL}/books/${isbn13}`)
        .then(response => response.json())
        .then(book => {
            displayDetails(book);
            // return another promise
            // whatever you return will be the success value of the promise
            return fetch(`${BASE_URL}/search/${book.authors}`);
        })
        .then(response => response.json())
        .then(data => {
            stopSpinner();
            console.log(data);
        })
        .catch(handleErrors)
        .finally(stopSpinner);
}

loadBtn.addEventListener('click', () => {
    getNewReleases();
});

container.addEventListener('click', (event) => {
    if (event.target.nodeName == 'BUTTON') {
        const isbn13 = event.target.getAttribute('data-isbn');
        getBookDetails(isbn13);
    }
});

const searchBooks = function(query) {
    startSpinner();
    // /search/{query}/{page}
    container.innerHTML = '';
    fetch(`${BASE_URL}/search/${query}`)
        .then(response => response.json())
        .then(data => {
                if (data.total == 0) {
                    throw new Error("No results found");
                    // container.innerHTML = `
                    // <div class="alert alert-primary" role="alert">
                    //     Your query returned zero results.
                    // </div>
                    // `
                } else {
                    for(const book of data.books) {
                        appendBook(book);
                    }
                }
                searchInput.value = '';
        })
        .catch(handleErrors)
        .finally(stopSpinner);
}

searchBtn.addEventListener('click', () => {
    const searchQuery = searchInput.value;
    if (searchQuery) {
        searchBooks(searchQuery);
    }
});

