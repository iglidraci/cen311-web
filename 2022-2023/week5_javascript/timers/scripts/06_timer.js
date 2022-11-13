// create a timer

const startTimer = function() {
    let remainingSeconds = 70;
    const ourTimerId = setInterval(() => {
        const min = String(Math.trunc(remainingSeconds/60)).padStart(2, 0);
        const sec = String(remainingSeconds%60).padStart(2, 0);
        const timerParagraph = document.querySelector('#timer');
        timerParagraph.textContent = `You've got ${min}:${sec}`;
        remainingSeconds--;
        // when remainingSeconds 0 stop
        if (remainingSeconds == 0){
            clearInterval(ourTimerId);
            timerParagraph.textContent = '';
            document.querySelector('#times-out').textContent='Time is up';
        }
    }, 1000);
}
