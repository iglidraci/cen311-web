let firstName = null;
const fullName = firstName ?? "alice";
console.log(fullName);
const person = {
    firstName: 'bob',
    age: 23,
    job: 'dev'
}
console.log(person.father?.firstName);

const father = {
    name: null
};

person.father = father;
console.log(person.father?.firstName??'bjorn');