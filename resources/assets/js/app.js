require('./bootstrap');

import Vuetify from 'vuetify'

import Vue from 'vue'
import axios from 'axios'
import store from './vuex/store'
import router from './vue-router/router'
import Login from './views/Login'
import Register from './views/Register'
import Dashboard from './views/Dashboard'
import AboutUs from './views/AboutUs'


Vue.config.productionTip = false


Vue.use(Vuetify)

window.axios = axios

window.Vue = require('vue')

window.Vuetify = require('vuetify');


const vuetifyOptions = {}


const app = new Vue({
    vuetify: new Vuetify(vuetifyOptions),
    router,
    store,
    components: {Login, Register, Dashboard, AboutUs},
    el: '#app',
})

