/*Call stack*/
function chicken() {
    return egg();
}
function egg() {
    return chicken();
}
console.log(chicken() + " came first."); // -> Find the output