import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from './router'
import CInput from './components/CInput.vue'
import CCountry from './components/CCountry.vue'
import CPhone from './components/CPhone.vue'
import CDialog from './components/CDialog.vue'
Vue.config.productionTip = false
Vue.component('c-input', CInput);
Vue.component('c-country', CCountry);
Vue.component('c-phone', CPhone);
Vue.component('c-dialog', CDialog);
new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
