window.onload = () => {
    var count = 0;
    //console.log(`main onload.`);
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('/sw.js');
    }
    /*
        We want to load the json file projects.json in a global variable and have the service worker sw.js load it into the local cache.
        If the file on the server is newer than the one in the cache then clear cache and load the new version into cache.
    */
}


function loadIframes(data) {
    //console.log(`main.js loadIframes data: ${data}`);
    let html = "";
    if (data === "wae") {
        //console.log(`main.js loadIframes 2`);
        html += `<iframe title="Weather and Exchange" class="demo_frame" src="/weather-and-exchange/wae.html"></iframe>`;
        //console.log(`main.js loadIframes 3: ${html}`);
    }
    else if (data === "receipt") {
        //console.log(`main.js loadIframes 4`);
        html += `<iframe title="Weather and Exchange" style="min-height: 80vh; width: 75vw;" src="/weather-and-exchange/wae.html"></iframe>`;
        //console.log(`main.js loadIframes 5`);
    }
    else {
        console.log(`main.js loadIframes else data: ${data}`);
    }

    if (html !== "") {
        //console.log(`main.js loadIframes 10: ${html}`);
        Helper.setHtml("main", html);
    }
}

function getPage(data, lang) {
    let pages = ["home", "about", "projects", "demoPages", "contact"];
    //alert(`1 ${data} index ${pages.findIndex(tmp => tmp == data)}`);
    if (pages.findIndex(tmp => tmp == data) > -1) {
        //alert(`2 ${server} /page.php?page=${data}`);
        fetch(`/index.php?page=${data}&lang=${lang}`)
            .then(result => result.text())
            .then(html => {
                //alert(`3 ${xRes}`);
                Helper.setHtml("main", html);
            });
    }
    else {
        Helper.setHtml("main", "<div>Error 401: Reasource not found! main page: " + data + "</div>");
    }
}
