import { createApp } from 'vue'
import Calculator from './components/Calculator.vue';

const app = createApp({
    components: {
        Calculator
    }
});

// mount the app to the DOM
app.mount('#app')

require('./bootstrap');

