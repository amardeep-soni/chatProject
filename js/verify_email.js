const form = document.querySelector(".verify form"),
    verifyBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt"),
    successText = form.querySelector(".success-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //prevanting form from submitting
}
window.onload = () => { // onload send the mail to the current user email
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/send_mail.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") { // if mail is send successfully
                    successText.textContent = 'Mail send successfully';
                    successText.style.display = "block";
                } else { // if mail is not send successfully reload the page
                    location.reload();
                }
            }
        }
    }
    xhr.send();
}
verifyBtn.onclick = () => { // send the mail and code to verify email
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/verify_email.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") { // if email is verifyed redirect the user to login
                    successText.textContent = 'Email is verifyed.';
                    successText.style.display = "block";
                    errorText.style.display = "none";
                    setTimeout(() => {
                        setSessionAndRedirect();
                    }, 3000);
                } else { // if any error occured then print the erro
                    errorText.textContent = data;
                    errorText.style.display = "block";
                    successText.style.display = "none";
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
function setSessionAndRedirect() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./php/login.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    window.location.href = "user.php"; // redirect to chat.php
                } else {
                    // Handle any errors or display a message
                }
            }
        }
    }
    xhr.send();
}
