import { request } from '/utils.js';

const divHome =  document.querySelector('.home');

async function getServices() {
    const data = await request(`get-all-services`);

    data.forEach(e => {
       divHome.insertAdjacentElement("afterbegin", `
            //html structure...
        `);
    });
}

document.querySelector('.search').addEventListener('input', async (e) => {
    if (e.value == "") {
        location.reload();
    } else {
        const data = await request(`serach`, {
            method: 'POST',
            body: {
                searchValue: e.value,
            }
        })

        divHome.innerHTML = " ";

        data.forEach(e => {
            divHome.insertAdjacentElement("afterbegin", `
                //html structure...
            `);
        });
    }
})

