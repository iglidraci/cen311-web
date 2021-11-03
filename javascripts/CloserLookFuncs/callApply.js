'use strict'

const inter = {
    team: 'inter',
    since: 1908,
    players: [],
    addPlayer:function (player) {
        console.log(`${this.team} added player ${player}`);
        this.players.push(player);
    }
};

const addPlayer = inter.addPlayer;

inter.addPlayer('martinez');
inter.addPlayer('dzeko');

// manually set this keyword for any function

addPlayer.call(inter, 'barella');

console.log(inter);

const milan = {
    team: 'milan',
    since: 1899,
    players: []
}

addPlayer.call(milan, 'ibrahimovic');
addPlayer.call(milan, 'hernandez');

addPlayer.call(milan, ...['Tomori']);

// apply takes an array of parameters
addPlayer.apply(milan, ['diaz']);
// bind returns a new function where this keyword is replaced

addPlayer.bind(milan)('romagnoli');

console.log(milan);

inter.tropies = 0;
inter.win = function() {
    this.tropies++;
    console.log(this);
}

// if we don't bind, this keyword will point to the button
document.querySelector('.win').addEventListener('click', inter.win.bind(inter));


// IIFE

(function testIIFE() {
    console.log("this function will only execute once and never again");
})();

function insertionSort(array) {
    for(let i=1; i<array.length; i++) {
        let key = array[i];
        let j = i-1;
        while (j >=0 && array[j] > key) {
            array[j+1] = array[j];
            j--;
        }
        array[j+1] = key;
    }
}

const arr = [1, 10, 2, 6, 1, 2, 5, 0, 19, 15];

insertionSort(arr);
console.log(arr);