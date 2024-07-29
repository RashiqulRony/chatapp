
import './bootstrap';
import { createApp }        from 'vue';
import router               from './route/router';
import store                from './store/index';
import ToastPlugin          from 'vue-toast-notification';
import { toastr }             from './config/helpers.js'

import 'vue-toast-notification/dist/theme-bootstrap.css';

const app = createApp().use(router);
app.use(store);
app.use(ToastPlugin);
app.config.globalProperties.$tAlert = toastr;
app.mount('#app');

