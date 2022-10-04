const searchBar = document.querySelector(".users .search input"),
    searchBtn = document.querySelector(".users .search button"),
    userList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

// 14 to 19 code is written bacause two ajax is running in the same file and to avoid this we have added and remove class active when search function works

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if (searchTerm != "") { // here we are adding the active class when search bar works and
        searchBar.classList.add("active");
    } else { // removing the active class when search bar doesnot work
        searchBar.classList.remove("active");
    }
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(() => {
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/user.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains("active")) { // if active not contains in seach bar then add this data
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // this function will run frequently after 500ms