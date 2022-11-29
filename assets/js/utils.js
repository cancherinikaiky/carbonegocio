async function request(url, options={}) {
    const baseURL = 'http://localhost/tecStart';

    if (options.body) {
        options.body = new URLSearchParams(options.body).toString();
        options.headers = { 'Content-type': 'application/x-www-form-urlencoded' };
    }
    
    options.method = options.method || 'GET';

    const req = await fetch(`${baseURL}/${url}`, options);
    return await req.json();
}

export { request };