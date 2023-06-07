export default {
    install(app) {
        app.config.globalProperties.$api = {
            async send(url, data, method = 'GET') {
                let isGET = method.toLowerCase() === 'get';
                if (isGET) {
                    url += '?' + new URLSearchParams(data).toString();
                }

                return await fetch(`/api/${url}`, {
                    method: method,
                    mode: 'cors',
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer',
                    ...(!isGET ? { body: JSON.stringify(data) } : null)
                })
                    .then(r => r.json())
                    .then(r => {
                        if (r.data.message) {
                            app.config.globalProperties.$notify({
                                type: 'success',
                                text: r.data.message
                            });
                        }

                        return r;
                    })
                    .catch(err => {

                        return false;
                    });
            },
            getPosts(filter) {
                return this.send('posts', filter);
            },
            getPartners() {
                return this.send('partners');
            },
            getServices() {
                return this.send('services');
            }
        }
    }
}