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


// all leagues available
// [GET] https://api-football-standings.azharimm.site/leagues

const isLoading = () => {
    // start the spinner
}

const stopLoading = () => {
    // hide the spinner
}

const appendLeague = (league) => {
    // insertAdjacentHTML('beforeend', html)
}

const getAllLeagues = () => {
    // create XMLHttpRequest object
    // open
    // send
    // listen to load
        // JSON.parse
        // append each league
}

const renderJsonToTable = (data) => {
    // only last 14 seasons
    // header array with obj keys
    // createElement table
    // tr and insert row
    // insert each header row as th inside tr


    // now add the json data of seasons array to the table

    // for each season
        // tr insert row
        // for each header
            // tabCell = tr.insertCell
            // tabCell.innerHtml
    
    // append the html table to the tableContainer
}

// seasons available [ENDPOINT] /leagues/{id}/seasons
const getSeasonsPerLeague = (leagueId) => {
    // create xhr object

    // listen to load
       // call renderJsonToTable
}



loadButton.addEventListener('click', () => {
    // get all leagues in case we click the button
    // hide the button
});

// load all the seasons for one league
container.addEventListener('click', (event) => {
    // select all .btn-season
    // if 'btn-season' in event.target.classList
       // get index of event.target
       // get id from allLeagues[index]
       // call getSeasonsPerLeague
});

const appendTeamToBoard = (row, position) => {
      // standingBoard.insertAdjacentHTML('beforeend', html);
}


// endpoint to get standings
// [GET] https://api-football-standings.azharimm.site/leagues/eng.1/standings?season=2020&sort=asc


tableContainer.addEventListener('click', (event) => {
    // make the request only if we clicked the year
    // if year
        // create xhr object
        // listen to load
        // set the title
        // set the season
        // reset standingBoard.textContent
        // append each team, position to the board (call appendTeamToBoard)
});