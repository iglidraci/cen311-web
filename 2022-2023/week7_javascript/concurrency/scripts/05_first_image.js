/**
 * Fetch a couple of images and display the first one available
 */

async function fetchAndDecode(url, description) {
    const res = await fetch(url);
    if (!res.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    const data = await response.blob();
    return [data, description];
}

const coffee = fetchAndDecode("images/capybara.jpeg", "Coffee");
const tea = fetchAndDecode("images/caracal.jpeg", "Tea");

Promise.any([coffee, tea])
.then(([blob, description]) => {
    const objectURL = URL.createObjectURL(blob);
    const image = document.createElement("img");
    image.src = objectURL;
    image.alt = description;
    document.body.appendChild(image);
})
.catch((e) => {
    console.log(e);
});
  