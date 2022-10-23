const btn = document.querySelector('#load-prereq');

btn.addEventListener('click', () => {
    fetch('api/book/get_prerequisites.php')
        .then(response => response.json())
        .then(console.log)
        .catch(console.error);
})