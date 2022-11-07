const foods = new Set([
    'pizza', 'soup', 'hamburger', 'salad', 'pizza', 'salad'
]);

console.log(foods);

for (const val of foods) {
    console.log(val);
}

foods.add('sushi');
console.log(foods.has('pizza'));

const map = new Map();
map.set('age', 90);
map.set('firstName', 'Foo');
map.set('lastName', 'Bar');
console.log(map);
console.log(map.has('age'));

const mapKV = map.entries();

for(const kv of mapKV)
    console.log(kv);