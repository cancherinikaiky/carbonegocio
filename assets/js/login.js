import { request } from '/utils.js';

const form = document.querySelector("#form-login");
const message = document.querySelector("#message");

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const dataUser = new FormData(form);

    const data = await request(`login`,{
        method: "POST",
        body: dataUser,
    });
    
    const user = await data.json();
    console.log(user);  
    
    if(user.type == "success") {
        window.location.href = "home";
    }else {
        message.classList.add("message");
        message.classList.remove("success", "warning", "error");
        message.classList.add(`${user.type}`);
        message.innerHTML = user.message;
    }                       
});