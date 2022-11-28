const fetchBtn = document.getElementById('fetch-btn');
const usernameInput = document.getElementById('username');
const usernameError = document.getElementById('username-error');
const userDiv = document.getElementById('user-div');
const followersDiv = document.getElementById('followers-div');
const paginationDiv = document.getElementById('pagination-div');
const PAGE_SIZE = 20;

const fetchJSON = async (url) => {
    const response = await fetch(url);
    if (!response.ok)
        throw new HttpError("Failed to fetch user: " + response.status);
    const data = await response.json();
    return data;
}


class HttpError extends Error {
    constructor(response) {
        super(`Url: ${response.url}, status: ${response.status}`);
        this.response = response;
    }
}

const fetchGithubUser = (username) => {
    const GITHUB_URL = 'https://api.github.com/users'
    return fetchJSON(`${GITHUB_URL}/${username}`)
        .then(user => {
            const html = `
            <div class="card" style="width: 18rem;">
                <img src="${user.avatar_url}" class="card-img-top" alt="${username}">
                <div class="card-body">
                    <h5 class="card-title">${user.name ?? username}</h5>
                    <p class="card-text">
                        Created at: ${new Date(user.created_at).toDateString()}
                    </p>
                    <p>
                        Followers: <span class="badge bg-secondary">${user.followers}</span>, 
                        Following: <span class="badge bg-secondary">${user.following}</span>
                    </p>
                    <div class="card-body">
                        <a id="followers-btn" data-username="${username}" class="card-link">Followers</a>
                        <a id="following-btn" data-username="${username}" class="card-link">Following</a>
                    </div>
                </div>
            </div>`;
            userDiv.innerHTML = html;
            followersDiv.innerHTML = '';
            paginationDiv.innerHTML = '';
            console.log(user);
        })
        .catch(error => {
            if (error instanceof HttpError){
                console.log("no user found");
            } else {
                throw error;
            }
        })
}

fetchBtn.addEventListener('click', () => {
    const username = usernameInput.value;
    if (username) {
        usernameError.innerText = '';
        fetchGithubUser(username);
    } else {
        usernameError.innerText = 'Username is required';
    }
})

// const username = prompt("enter github username");
// fetchGithubUser(username);

userDiv.addEventListener('click', (event) => {
    const target = event.target;
    if (target.nodeName == 'A') {
        const username = target.getAttribute('data-username');
        if (target.id === 'followers-btn') {
            fetchFollowers(username);
        } else if (target.id === 'following-btn') {
            fetchFollowers(username, 1, 'following')
        }
    }
})

async function fetchFollowers(username, page=1, type='followers') {
    const URL = `https://api.github.com/users/${username}/${type}?per_page=${PAGE_SIZE}&page=${page}`;
    const response = await fetch(URL);
    const data = await response.json();
    followersDiv.innerHTML = '';
    for(const follower of data) {
        const html = `
        <div class="col">
            <div class="card">
            <img src="${follower.avatar_url}" class="card-img-top" alt="${follower.login}">
            <div class="card-body">
                <h5 class="card-title">${follower.name??follower.login}</h5>
            </div>
            </div>
        </div>`;
        followersDiv.insertAdjacentHTML('beforeend', html);
    }
    const prevPage = page == 1 ? 1 : page - 1;
    const nextPage = page + 1;
    paginationDiv.innerHTML = `
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a href="#" data-page="${prevPage}" data-username="${username}"
                        class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                    <a href="#" data-page="${nextPage}" data-username="${username}" 
                    class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    `;
    [...document.getElementsByClassName('page-link')].forEach(a => {
        a.addEventListener('click', function(){
            const pageNr = +this.getAttribute('data-page');
            const username = this.getAttribute('data-username');
            fetchFollowers(username, pageNr, type);
        })
    })
}
