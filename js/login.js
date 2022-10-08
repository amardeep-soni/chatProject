const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //preevanting form from submitting
}
continueBtn.onclick = () => {
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "user.php";
                } else if (data == 'not verifyed') { // if the user is not verified his email then redirect him to verify email
                    errorText.textContent = 'Your email is not verifyed.';
                    errorText.style.display = "block";
                    setTimeout(() => { // hide the error message after 3 second
                        location.href = "verify_email.php";
                    }, 3000);

                } else {
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    setTimeout(() => { // hide the error message after 3 second
                        errorText.style.display = "none";
                    }, 3000);
                }
            }
        }
    }
    // we have to send the form data throught ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); // sending the form data to php
}