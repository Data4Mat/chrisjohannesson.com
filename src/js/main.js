window.onload = () => {
    var count = 0;
    console.log(`main onload count: ${count}`);
    if ('serviceWorker' in navigator) {
        console.log(`main if_navigator count: ${count}`);
        navigator.serviceWorker
            .register('/sw.js');
        count++;
    }
}

function loadIframes(data) {
    alert(`main.js loadIframes data: ${data}`);
    let html = "";
    if (data === "wae") {

        html += `<iframe title="Weather and Exchange" style="min-height: 80vh; width: 75vw;" src="/weather-and-exchange/wae.html"></iframe>`;
    }

    if (html !== "") {
        Helper.setHtml("container", html);
    }
}