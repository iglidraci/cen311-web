let cat = document.querySelector("#cat");
let angle = Math.PI / 2;
function animate(time, lastTime) {
    if (lastTime != null) {
        angle += (time - lastTime) * 0.01;
    }
    cat.style.top = (Math.sin(angle) * 100) + "px";
    cat.style.right = (Math.cos(angle) * 100) + "px";
    requestAnimationFrame(newTime => animate(newTime, time));
}

document.querySelector('#animate').addEventListener('click', () => {
    cat.style.display = 'inline';
    requestAnimationFrame(animate);
});


