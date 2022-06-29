import router from "./router";

window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.withCredentials = true;
window.axios.interceptors.response.use({}, error => {
    if (error.response.status === 401 || error.response.status === 419) {
        const token = localStorage.getItem('x_xsrf_token')
        if (token) {
            localStorage.removeItem('x_xsrf_token')
        }
        router.push({name: 'user.login'})
    }
})
