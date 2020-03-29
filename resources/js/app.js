require('./bootstrap');
 
window.Vue = require('vue');

Vue.component('event-component', require('./components/EventComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);

export const EventBus = new Vue();

const app = new Vue({
    el: '#app',
});