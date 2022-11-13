class Animal {
    speak() {
        return this;
    }
}

const obj = new Animal();
console.log(obj.speak()); // the Animal object
console.log(obj.speak() == obj); // -> Output?
const speak = obj.speak;
console.log(speak()); // -> Output?
console.log(globalThis);