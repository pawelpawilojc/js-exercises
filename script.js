function space() {
    document.getElementById("title").textContent = "";
    document.getElementById("date").textContent = "";
    document.getElementById("pic").src = "";
    var req = new XMLHttpRequest();
    var url = "https://api.nasa.gov/planetary/apod?api_key=";
    var api_key = config.NASA_API_KEY;
    function getRandomInt(max) {
        return 1 + Math.floor(Math.random() * max);
    }
    var day = getRandomInt(28);
    if (day < 10) day = "0" + day;
    var month = getRandomInt(12);
    if (month < 10) month = "0" + month;
    var year = new Date().getFullYear() - getRandomInt(20);
    var date = "&date=" + year + "-" + month + "-" + day;
    req.open("GET", url + api_key + date);
    req.send();

    req.addEventListener("load", function () {
        if (req.status == 200 && req.readyState == 4) {
            var response = JSON.parse(req.responseText);
            document.getElementById("title").textContent = response.title;
            document.getElementById("date").textContent = response.date;
            document.getElementById("pic").src = response.hdurl;

        }
    })
}