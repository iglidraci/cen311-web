const foods = new Set([
    'pizza', 'soup', 'hamburger', 'salad', 'pizza', 'salad'
]);

const obj = {
    age: 23,
    town: 'Tirana'
};

console.log(foods);

for (const val of foods) {
    console.log(val);
}

for(const key in obj)
    console.log(key);

console.log(foods.has('pizza'));

const map = new Map();
map.set('age', 23);
map.set('firstName', 'igli');
map.set('lastName', 'draci');
console.log(map);

const mapKV = map.entries();

for(const kv of mapKV)
    console.log(kv);