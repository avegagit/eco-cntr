import lozad from 'lozad';

export default {
    install(app) {
        app.config.globalProperties.$lozad = (selector = '.lozad') => {
            lozad(selector).observe();
        }
    }
}