const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-txt"),
    successText = form.querySelector(".success-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //preevanting form from submitting
}
continueBtn.onclick = () => {
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                if (data == "success") {
                    successText.textContent = 'Account Created successfully.';
                    successText.style.display = "block";
                    errorText.style.display = "none";
                    setTimeout(() => {
                        location.href = "verify_email.php"; // after data is inserted successfully redirect the user to verify_email page 
                    }, 3000);
                } else {
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