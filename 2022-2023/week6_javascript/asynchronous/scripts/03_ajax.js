// the backend URL, public API, no authentication needed
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

const handleErrors = function(request) {
    request.addEventListener('error', function(){
        stopSpinner();
        container.innerHTML = `
                                <div class="alert alert-danger" role="alert">
                                    An error occurred.
                                </div>
                                `
    });
}

const appendBook = function(book) {
    /**
     * This is how the response object we get from the API looks like
     * image: "https://itbook.store/img/books/1001668595152.png"
     * isbn13: "1001668595152"
     * price: "$0.00"
     * subtitle: "A Beginner&#039;s Guide to Understanding Game Hacking Techniques"
     * title: "Game Hacking Academy"
     * url: "https://itbook.store/books/1001668595152"
     */
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
    const request = new XMLHttpRequest();
    request.open('GET', `${BASE_URL}/new`);
    request.send();
    request.addEventListener('load', function(){
        const data = JSON.parse(this.responseText);
        const books = data.books;
        console.log(books);
        for (const book of books) {
            appendBook(book);
        }
        stopSpinner();
    });
    handleErrors(request);
}

const displayDetails = function(book) {
    /**
     * The response data that we are expecting from the API
     * authors: "Attilathedud"
     * desc: "Hacking games requires a unique combination of reversing, memory management,
     *  networking, and security skills. Even as ethical hacking has exploded in popularity,
     *  game hacking still occupies a very small niche in the wider security community. 
     * While it may not have the same headline appeal as a Chrome..."
     * image: "https://itbook.store/img/books/1001668595152.png"
     * isbn10: "166859515X"
     * isbn13: "1001668595152"
     * language: "English"
     * pages: "511"
     * pdf: {Free eBook: 'https://www.dbooks.org/d/5668330414-1668594823-1266792716650a6c/'}
     * price: "$0.00"
     * publisher: "Self-publishing"
     * rating: "0"
     * subtitle: "A Beginner&#039;s Guide to Understanding Game Hacking Techniques"
     * title: "Game Hacking Academy"
     * url: "https://itbook.store/books/1001668595152"
     * year: "2021"
     */

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

const getBookDetails = function(isbn13) {
    // Get book details by ISBN
    // /books/{isbn13}
    container.innerHTML = '';
    startSpinner();
    const request = new XMLHttpRequest();
    request.open('GET', `${BASE_URL}/books/${isbn13}`);
    request.send();
    request.addEventListener('load', function(){
        const book = JSON.parse(this.responseText);
        displayDetails(book);
        // after getting the book details, get related books (by author)
        const innerRequest = new XMLHttpRequest();
        innerRequest.open('GET', `${BASE_URL}/search/${book.authors}`);
        innerRequest.send();
        innerRequest.addEventListener('load', function(){
            console.log(JSON.parse(this.responseText));
        })
        stopSpinner();
    });
    handleErrors(request);
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
    const request = new XMLHttpRequest();
    request.open('GET', `${BASE_URL}/search/${query}`);
    request.send();
    request.addEventListener('load', function(){
        const data = JSON.parse(this.responseText);
        if (data.total == 0) {
            container.innerHTML = `
            <div class="alert alert-primary" role="alert">
                Your query returned zero results.
            </div>
            `
        } else {
            for(const book of data.books) {
                appendBook(book);
            }
        }
        searchInput.value = '';
        stopSpinner();
    });
    handleErrors(request);
}

searchBtn.addEventListener('click', () => {
    const searchQuery = searchInput.value;
    if (searchQuery) {
        searchBooks(searchQuery);
    }
})