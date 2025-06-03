import { createApp } from 'vue';
import ChatComponent from './Components/ApplicationLogo.vue'

const app = createApp({});  
app.component('chat-component', ChatComponent);
app.mount('#app');
