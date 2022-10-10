const form = document.querySelector(".forgetPass form"),
    errorText = form.querySelector(".error-txt"),
    successText = form.querySelector(".success-txt"),
    emailInput = form.querySelector(".emailInput input"),
    sendBtn = form.querySelector(".button input"),
    hiddenField = form.querySelector("#hiddenField");


form.onsubmit = (e) => {
    e.preventDefault(); //preevanting form from submitting
}
sendBtn.onclick = () => { // first when sendBtn is click then find the email
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/forget-pass.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;

                if (data == 'Found Email') { // if the entered email is found
                    successText.textContent = data;
                    successText.style.display = 'block';
                    errorText.style.display = 'none';

                    emailInput.readOnly = true; // don't allow the user to change the email
                    sendBtn.value = 'Send Code'; // change the button text

                    setTimeout(() => {
                        successText.textContent = 'Click the button to send code in you mail!';
                    }, 1000);

                    sendBtn.onclick = () => {  // second if sendBtn clicked again then send the code to the mail and update db
                        errorText.textContent = 'Sending Code in your Mail!';
                        errorText.style.display = 'block';
                        successText.style.display = 'none';
                        let xhr2 = new XMLHttpRequest();
                        xhr2.open("POST", "php/send_mail.php", true);
                        xhr2.onload = () => {
                            if (xhr2.readyState == XMLHttpRequest.DONE) {
                                if (xhr2.status === 200) {
                                    let data = xhr2.response;
                                    if (data == 'success') { // if code is send successfully
                                        successText.textContent = 'Code sent successfully!';
                                        successText.style.display = 'block';
                                        errorText.style.display = 'none';

                                        // as code is send successfully then put element to add code
                                        hiddenField.innerHTML = `
                                        <div class="field input">
                                            <label for="code">Enter Code</label>
                                            <input type="text" id="code" name="code" placeholder="Enter your code">
                                        </div>`;
                                        sendBtn.value = 'Verify Code'; // change the button text

                                        sendBtn.onclick = () => {  //third if sendBtn clicked then check the code of db
                                            let xhr3 = new XMLHttpRequest();
                                            xhr3.open("POST", "php/verify_email.php", true);
                                            xhr3.onload = () => {
                                                if (xhr3.readyState == XMLHttpRequest.DONE) {
                                                    if (xhr3.status === 200) {
                                                        let data = xhr3.response;
                                                        if (data == 'success') { // if the code is matched with db
                                                            successText.textContent = 'Code is matched!';
                                                            successText.style.display = 'block';
                                                            errorText.style.display = 'none';
                                                            sendBtn.value = 'Set Password'; // change the button text
                                                            // as code is matched successfylly then overright the code element and put the password input field so that user can input his/her new password
                                                            hiddenField.innerHTML = `
                                                            <div class="field input">
                                                                <label for="password">Enter Your new password</label>
                                                                <input type="text" id="password" name="password" placeholder="Enter your password">
                                                            </div>`;

                                                            document.querySelector("head").innerHTML += `<script src="js/passShowHide.js"></script>"`;

                                                            sendBtn.onclick = () => { // fourth if the sendBtn is clicked means now we have to update the password in the db
                                                                let xhr4 = new XMLHttpRequest();
                                                                xhr4.open("POST", "php/new_pass.php", true);
                                                                xhr4.onload = () => {
                                                                    if (xhr4.readyState == XMLHttpRequest.DONE) {
                                                                        if (xhr4.status === 200) { // if password is updated successfylly
                                                                            let data = xhr4.response;
                                                                            if (data == 'success') {
                                                                                successText.textContent = 'Password Reset Successfylly';
                                                                                successText.style.display = 'block';
                                                                                errorText.style.display = 'none';

                                                                                setTimeout(() => { // after two second redirect the user to login page
                                                                                    location.href = "login.php";
                                                                                }, 2000);
                                                                            } else { // if password is not updated
                                                                                errorText.textContent = data;
                                                                                errorText.style.display = 'block';
                                                                                successText.style.display = 'none';
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                let formData = new FormData(form);
                                                                xhr4.send(formData);
                                                            }
                                                        } else { // if the code is not matched with db
                                                            errorText.textContent = data;
                                                            errorText.style.display = 'block';
                                                            successText.style.display = 'none';
                                                        }
                                                    }
                                                }
                                            }
                                            let formData = new FormData(form);
                                            xhr3.send(formData);
                                        }
                                    } else { // if code is not send by any error
                                        errorText.textContent = data;
                                        errorText.style.display = 'block';
                                        successText.style.display = 'none';
                                    }
                                }
                            }
                        }
                        xhr2.send();
                    }
                } else { // if email is not found
                    errorText.textContent = data;
                    errorText.style.display = 'block';
                    successText.style.display = 'none';

                }
            }
        }
    }
    // we have to send the form data throught ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); // sending the form data to php
}