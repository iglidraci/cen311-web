'use strict';
console.log("wait 4 sec for your food")
// it runs only once
setTimeout((food) => console.log("get ya " + food), 4000, 'pizza');

console.log("I want a coffee as well, hurry up!");
console.log("That burger is taking to much time pal!");


setInterval(() => {
    console.log(new Date());
}, 2000);

// create a timer

const setTimer = function() {
    let remainingSeconds = 10;
    const ourTimer = setInterval(() => {
        const min = String(Math.trunc(remainingSeconds/60)).padStart(2, 0);
        const sec = String(remainingSeconds%60).padStart(2, 0);
        const timerParagraph = document.querySelector('#timer');
        timerParagraph.textContent = `You've got ${min}:${sec}`;
        remainingSeconds--;
        // when remainingSeconds 0 stop
        if (remainingSeconds===0){
            clearInterval(ourTimer);
            timerParagraph.textContent = '';
            document.querySelector('#times-out').textContent='Times up';
        }
    }, 1000);
}

const timerButton = document.querySelector('#start-timer');
timerButton.addEventListener(
    'click', () => {
        timerButton.style.display = 'none'
        setTimer();
    }
);
// setTimer();