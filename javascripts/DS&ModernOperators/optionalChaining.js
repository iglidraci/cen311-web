let firstName = null;
const fullName = firstName ?? "igli";
console.log(fullName);
const person = {
    firstName: 'igli',
    age: 23,
    job: 'developer'
}
console.log(person.father?.firstName);

const father = {
    name: 'adem'
};

person.father = father;
console.log(person.father?.firstName??'fathers name');