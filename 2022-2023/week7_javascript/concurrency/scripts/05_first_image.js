/**
 * Fetch a couple of images and display the first one available
 */

async function fetchAndDecode(url, description) {
    const res = await fetch(url);
    console.log(res);
    if (!res.ok) {
        console.log(res);
        throw new Error(`HTTP error! status: ${res.status}`);
    }
    const data = await res.blob(); //  file-like object of immutable, raw data
    return [data, description];
}

const capybara = fetchAndDecode("images/capybara.jpeg", "capybara");
const caracal = fetchAndDecode("images/caracal.jpeg", "caracal");

Promise.any([capybara, caracal])
.then((data) => {
    const [blob, description] = data;
    console.log(blob); // size in bytes
    // A string indicating the MIME type of the data contained in the Blob
    console.log(blob.arrayBuffer()); // promise
    console.log(blob.text()); // promise
    // static method creates a string containing a URL representing 
    // the object given in the parameter.
    const objectURL = URL.createObjectURL(blob);
    const image = document.createElement("img");
    image.src = objectURL;
    image.alt = description;
    document.body.appendChild(image);
})
.catch((e) => {
    console.log(e);
});
