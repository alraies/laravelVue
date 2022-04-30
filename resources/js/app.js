// Require Vue
require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlus,faTrashAlt } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.use(Vuetify)
library.add(faPlus,faTrashAlt )

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('')
// Register Vue Components
import App from './components/main'

// Initialize Vue
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({icons: {
        iconfont: 'mdi',
      }}),
    components:{App}
});
