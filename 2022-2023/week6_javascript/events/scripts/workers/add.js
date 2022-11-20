onmessage = (e) => {
    console.log("Message received from main script");
    const [a, b] = e.data;
    console.log('posting the result back');
    postMessage(a + b);
}