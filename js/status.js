// this functtion is called every 1 second and we call the update_status file in which it update the last_login of logged user

setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update_status.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                xhr.response;
            }
        }
    }
    xhr.send();
}, 1000);

// this functtion is called every 3 second and we call the get_status file in which we are setting the user status of logged and logged out user depending upon the condition

setInterval(function () {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_status.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                xhr.response;
            }
        }
    }
    xhr.send();
}, 3000);