// developer.mozilla.org
// A Promise is an object for a value not necessarily known when the promise 
// is created. It allows you to associate handlers with an asynchronous 
// action's eventual success value or failure reason.
// 3 states: pending, fulfilled, rejected


// promise constructor takes an execture
const lotteryPromise = new Promise((resolve, reject) => {
    console.log("Buying tickets");
    setTimeout(() => {
        if (Math.random() >= 0.5)
            resolve("You won the lottary");
        else
            reject(new Error("Ya lost"));
    }, 2000);
});

lotteryPromise.then(console.log).catch(console.error);

// promisifying the timeout function

const wait = (seconds) => {
    return new Promise((resolve) => {
        setTimeout(resolve, seconds*1000);
    })
};

wait(3).then(() => {
    console.log("Waited for 3 seconds");
    return wait(2);
}).then(() => console.log("Waited for another 2 seconds"));

// img exercise

const imgDiv = document.querySelector('.images');

const createImg = (path) => {
    return new Promise((resolve, reject) => {
        const img = document.createElement('img');
        img.src = path;

        img.addEventListener('load', () => {
            imgDiv.append(img);
            // resolve the image now
            resolve(img); 
        });

        img.addEventListener('error', () => {
            reject(new Error("Image not found"));
        });
    });
};

// let currentImg;

// createImg("images/img1.png")
//     .then(img => {
//         currentImg = img;
//         console.log(img, " loaded");
//         return wait(2);
//     })
//     .then(() => {
//         currentImg.style.display = 'none';
//         return createImg('images/img2.png');
//     })
//     .then((img) => {
//         currentImg = img;
//         console.log("Image 2 loaded");
//         return wait(2);
//     })
//     .then(() => {
//         currentImg.style.display = 'none';
//     })
//     .catch(console.error);


// consume promises with async/await

const whereAmI = async (country) => {
    // stop the execution of the function until the fetch is done
    // not blocking the main thread tho
    const response = await fetch(`https://restcountries.com/v3.1/name/${country}`);
    const data = await response.json();
    renderData(data[0]);
    return `You are in ${country}`;
}

const country = whereAmI('albania');
country.then(console.log).catch(console.error).finally(() => console.log("finally done"));
console.log("console log will be displayed first");


// parallel promises

const getThreeCountries = async (c1, c2, c3) => {
    try {
        const data = await Promise.all([
            whereAmI(c1),
            whereAmI(c2),
            whereAmI(c3)
        ]);
        console.log(data);
    } catch (error) {
        console.log(error);
    }
}

getThreeCountries('poland', 'spain', 'italy');

// promise combinators

// Promise.race

const raceEachOther = async (c1, c2, c3) => {
    // the winner of the race it might get rejected, doesn't matter
    try {
        const res = await Promise.race([
            whereAmI(c1),
            whereAmI(c2),
            whereAmI(c3)
        ]);
        console.log('The fastest', res);
    } catch (error) {
        console.log(error);
    }
}

raceEachOther('poland', 'spain', 'italy');

const timeOut = (sec) => {
    return new Promise((_, reject) => {
        setTimeout(() => {
            reject(new Error("request took too long"));
        }, sec);
    });
}

Promise.race([whereAmI('kosovo'), timeOut(1000)])
    .then(console.log)
    .catch(console.log);

// allSettled
// take an array of Promises and return all the settled ones

Promise.allSettled([
    Promise.resolve('Tada!!'),
    Promise.reject("Sth happend"),
    Promise.resolve('Do you wanna know why I use a knife')
]).then(console.log);

// Wait for all promises to be resolved, or for any to be rejected.
Promise.all([
    Promise.resolve('Tada!!'),
    Promise.reject("Sth happend"),
    Promise.resolve('You cant savor all the little emotions')
]).then(console.log).catch(console.error);

const loadAndPause = async () => {
    try {
        let img = await createImg("images/img1.png");
        console.log('loaded image1');
        await wait(2);
        img.style.display = 'none';
        await wait(2);
        img = await createImg("images/img2.png");
        console.log('loaded image2');
        await wait(2);
        img.style.display = 'none';
    } catch (error) {
        console.error(error);
    }
};

// loadAndPause();

const loadAll = async (imgsArray) => {
    try {
        const imgs = imgsArray.map(async img => await createImg(img));
        console.log(imgs);
        const imageElements = await Promise.all(imgs);
        console.log(imageElements);
        imageElements.forEach(img => img.classList.add('parallel'));
    } catch (error) {
        console.error(error);
    }
}

loadAll(['images/img1.png', 'images/img2.png']);