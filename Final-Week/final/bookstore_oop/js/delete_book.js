const allBtns = document.querySelectorAll('.js-delete');

allBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        const id = +btn.getAttribute('book-id');
        const url = 'api/book/delete.php';
        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({id}),
            }
        ).then((res) => {
            console.log(res);
            if (res.status == 204)
                btn.parentNode.parentNode.remove()
        })
        .catch(console.error);
    })
});