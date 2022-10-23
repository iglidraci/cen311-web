'use strict';

// this is the url where we are going to make ajax calls
// is a public API
const BASE_URL = 'https://api-football-standings.azharimm.site';



const container = document.querySelector('.container');
const spinner = document.querySelector('#spinner');
const loadButton = document.querySelector('.btn-load');
const tableContainer = document.querySelector('#table-container');
const standingContainer = document.querySelector('#standing-container');
const standingBoard = document.querySelector('#standing-board');


let leagueId;

let allLeagues = [];

// all leagues available
// [GET] https://api-football-standings.azharimm.site/leagues

const isLoading = () => {
    spinner.classList.remove('hide');
}

const stopLoading = () => {
    spinner.classList.add('hide');
}

const appendLeague = (league) => {
    const html = `
        <div class="card">
            <img src="${league.logos.light}" alt="League" style="width: 100%">
            <div class="inner-container">
            <h4><b>${league.abbr}</b></h4> 
            <p>${league.name}</p>
            <button class="btn-season">Show seasons</button>
            </div>
        </div>
      `
    container.insertAdjacentHTML('beforeend', html);
}

const getAllLeagues = () => {
    isLoading();
    const request = new XMLHttpRequest();
    request.open('GET', `${BASE_URL}/leagues`);
    request.send();
    request.addEventListener('load', function(){
        const jsonResponse = JSON.parse(this.responseText);
        const data = jsonResponse.data;
        allLeagues = data;
        allLeagues.forEach(league => {
            appendLeague(league);
        });
        stopLoading();
    });
}

const renderJsonToTable = (data) => {
    // only last 14 seasons
    const seasons = data.seasons.slice(0, 14);
    console.log(seasons);
    let header = ['year', 'displayName', 'startDate', 'endDate'];
    const table = document.createElement("table");
    let tr = table.insertRow();
    header.forEach(x => {
        const th = document.createElement('th');
        th.innerHTML = x;
        tr.appendChild(th);
    });
    // add the json data of seasons array to the table
    for (let i = 0; i < seasons.length; i++) {
        tr = table.insertRow();
        for (let j = 0; j < header.length; j++) {
            const tabCell = tr.insertCell();
            if (header[j].indexOf('Date') !== -1)
                tabCell.innerHTML = seasons[i][header[j]].slice(0, 10);
            else
                tabCell.innerHTML = seasons[i][header[j]]
        }
    }
    tableContainer.appendChild(table);
}

// seasons available [ENDPOINT] /leagues/{id}/seasons
const getSeasonsPerLeague = (leagueId) => {
    isLoading();
    const url = `${BASE_URL}/leagues/${leagueId}/seasons`;
    const request = new XMLHttpRequest();
    request.open('GET', url);
    request.send();

    request.addEventListener('load', function() {
        const jsonResponse = JSON.parse(this.responseText);
        renderJsonToTable(jsonResponse.data);
        const currentYear = new Date().getFullYear();
        getTableForSeason(leagueId, currentYear);
        stopLoading();
    })
}

const getSeasonsPerLeagueWithPromise = (leagueId) => {
    isLoading();
    const url = `${BASE_URL}/leagues/${leagueId}/seasons`;
    fetch(url)
        .then(console.log)
        .finally(stopLoading);
}


// get all leagues in case we click the button
// hide the button
loadButton.addEventListener('click', () => {
    getAllLeagues();
    loadButton.classList.add('hide');
});

// load all the seasons for one league
container.addEventListener('click', (event) => {
    const allButtons = container.querySelectorAll('.btn-season');
    if (event.target.classList.contains('btn-season')) {
        const index = [...allButtons].indexOf(event.target);
        const id = allLeagues[index].id;
        leagueId = id;
        getSeasonsPerLeague(id);
        container.classList.add('hide');
    }
});

const appendTeamToBoard = (row, position) => {
    const team = row.team;
    const logo = team.logos[0];
    const html = `
        <div class="standing-card">
            <img src="${logo.href}" alt="League"
                style="width: ${logo.width}; height: ${logo.height}">
            <div class="inner-container">
            <h4><b>${team.displayName}</b></h4> 
            <p>${position+1}</p>
            </div>
        </div>
      `
      standingBoard.insertAdjacentHTML('beforeend', html);
}

// endpoint to get standings
// [GET] https://api-football-standings.azharimm.site/leagues/eng.1/standings?season=2020&sort=asc


const getTableForSeason = (leagueId, year) => {
    isLoading();
    const request = new XMLHttpRequest();
    request.open('GET', `${BASE_URL}/leagues/${leagueId}/standings?season=${year}&sort=asc`);
    request.send();
    request.addEventListener('load', function() {
        const jsonResult = JSON.parse(this.responseText);
        setStandingTeams(jsonResult.data);
        stopLoading();
    });
}

const setStandingTeams = (data) => {
    standingContainer.querySelector('#title').textContent = data.name;
    standingContainer.querySelector('#season').textContent = data.seasonDisplay;
    const standings = data.standings;
    standingBoard.textContent = '';
    standings.forEach(appendTeamToBoard);
}


tableContainer.addEventListener('click', (event) => {
    const year = +event.target.innerHTML;
    if (year) {
        getTableForSeason(leagueId, year);
    }
});