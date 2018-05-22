import Vue from 'vue'
import App from './App'
import router from './router'
import Snotify from 'vue-snotify'; // 1. Import Snotify
// 2. Use Snotify
// You can pass {config, options} as second argument. See the next example or setConfig in [API] section
Vue.use(Snotify)
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
