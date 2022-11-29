import { request } from '/utils.js';

const form = document.querySelector("#form-register");
const message = document.querySelector("#message"); 

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dataUser = new FormData(form);

    const data = await request(`register`,{
        method: "POST",
        body: dataUser,
    });

    const user = await data.json();
    console.log(user);  

    if(user) {
        if(user.type == "success") {
            window.location.href = "login";
        }else {
            message.innerHTML = user.message;
            message.classList.remove("warning", "error");
            message.classList.add("message");
            message.classList.add(`${user.type}`);
        }
    }
});
