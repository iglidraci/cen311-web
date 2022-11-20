const request = new XMLHttpRequest(); // create the XMLHttpRequest object

request.open('GET', 'data/countries.xml'); // sets the request method and URL

request.send(); // Initiates the request

request.addEventListener('load', function(){ // wait for load event and handle it 
    console.log(this.responseXML);
});

// beside from load event, we hve progress, error, and abort

const updateProgress = function(event) {
    if (event.lengthComputable) {
        const percentComplete = (event.loaded / event.total) * 100;
        console.log(`${percentComplete}/100%`);
    } else {
        console.log('Unable to compute progress information since the total size is unknown');
    }
}

const loadingFailed = function(_) {
    console.log("An error occurred while loading the XML file.");
}

const loadingAborted = function(_) {
    console.log("The loading has been aborted by the user.");
}

request.addEventListener("progress", updateProgress);
request.addEventListener("error", loadingFailed);
request.addEventListener("abort", loadingAborted);
