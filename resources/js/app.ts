import './bootstrap';
import { createApp } from 'vue';
import App from './src/App.vue';
import router from './src/router/index';
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import Error from './src/components/Error.vue';
import BaseInput from './src/components/BaseInput.vue';

createApp(App)
  .use(router)
  .use(ToastPlugin)
  .component('Error', Error)
  .component('BaseInput', BaseInput)
  .mount('#app');


