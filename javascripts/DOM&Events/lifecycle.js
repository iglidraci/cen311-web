// after dom is ready

document.addEventListener('DOMContentLoaded', (e) => {
    console.log('html parsed and dom tree built');
    console.log(e);
});

document.addEventListener('load', (e) => console.log(e));

document.addEventListener('beforeunload', (e) => {
    e.preventDefault();
    console.log(e);
    e.returnValue = '';
})