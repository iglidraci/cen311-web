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

// like in python, returns an array with first element key and second value
const entries = Object.entries(person);

console.log(entries);

for (const keyValue of entries) {
    console.log("Key=" + keyValue[0] + ", Value="+keyValue[1]);
}

const str = 'firstName';
console.log(person[str]);

for (const key of Object.keys(person))
    console.log(`${key} = ${person[key]}`);