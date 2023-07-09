// let's make all chat area dynamic

const form = document.querySelector(".typing-area"),
    inputField = form.querySelector(".input-field"),
    sendBtn = form.querySelector("button"),
    chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault(); //preevanting form from submitting
}

sendBtn.onclick = () => {
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = ""; // once message inserted into database then leave blank input field
                scrollToBottom();
            }
        }
    }
    // we have to send the form data throught ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); // sending the form data to php
}

chatBox.onmouseenter = () => {
    chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove("active");
}
function loadChat() {
    console.log("load chat");
    // let's start Ajax
    let xhr = new XMLHttpRequest();  // creating xml object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if (!chatBox.classList.contains("active")) { // if active class not contains in chatbox the message scroll to bottom 
                    scrollToBottom();
                }
            }
        }
    }
    // we have to send the form data throught ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); // sending the form data to php
}
setInterval(() => {
    loadChat();
}, 2000); // this function will run frequently after 2s
loadChat();


function scrollToBottom() { // this function will make out message automatically to bottom
    chatBox.scrollTop = chatBox.scrollHeight;
}