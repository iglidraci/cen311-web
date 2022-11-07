const person = {
    firstName: 'alice',
    age: 23,
    job: 'spy'
}

for(const key of Object.keys(person))
    console.log("key=" + key);

for (const value of Object.values(person)) {
    console.log("value="+value);
}

const entries = Object.entries(person);

console.log(entries);

for (const keyValue of entries) {
    // like a tuple
    console.log("Key=" + keyValue[0] + ", Value="+keyValue[1]);
}