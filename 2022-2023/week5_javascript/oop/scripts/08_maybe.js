class Maybe {
    #value;
    constructor(value) {
        this.#value = value;
    }

    static unit(value) {
        return new Maybe(value);
    }

    map(func) {
        if (this.#value === null || this.#value === undefined) {
            return Maybe.unit(null);
        }
        return Maybe.unit(func(this.#value));
    }
    get value() {
        return this.#value;
    }
}

class User {
    constructor(name, friends=[]) {
        this.name = name;
        this.friends = friends;
    }
}

class Request {
    constructor(user, ...other_stuff) {
        this.user = user;
        console.log(...other_stuff);
    }
}

const first = x => {
    if(x.length > 0) return x[0];
    return undefined;
}


const me = new User("Me");
const foo = new User("Foo");
const bar = new User("Bar", [me, foo]);
const baz = new User("Baz", [me, foo]);
const thud = new User("Thud", [bar, baz]);

const request = new Request(thud);

const firstFriendsOfFirstFriend = Maybe.unit(request)
                                    .map(request => request.user)
                                    .map(user => user.friends)
                                    .map(first)
                                    .map(first_friend => first_friend.friends)
                                    .map(first)
                                    .value;
console.log(firstFriendsOfFirstFriend);