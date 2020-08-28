import Vue from 'vue'

import VueRouter from 'vue-router'

Vue.use(VueRouter)
// import Home from './../views/Home'
// import Services from './../views/Services'
// import Pricing from './../views/Pricing'
// import Contact from './../views/Contact'
// import News from './../views/News'
// import SinglePage from './../views/SinglePage'
// import Login from '././../views/auth/Login'
// import Register from '././../views/auth/Register'
// import Email from './././../views/auth/passwords/Email'



const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        // {
        //     path: '/dashboard',
        //     redirect: {path : '/'}
        // },
//         {
//             path: '/services',
//             name: 'services',
//             component: Services
//         },
//         {
//             path: '/pricing',
//             name: 'pricing',
//             component: Pricing
//         },
//         {
//             path: '/contact',
//             name: 'contact',
//             component: Contact
//         },
        // {
        //     path: '/login',
        //     name: 'login',
        //     component: Login,
        //     meta: { requiredAuth: true }
        // },
//         {
//             path: '/news',
//             name: 'news',
//             component: News
//         },
        // {
        //     path: '/register',
        //     name: 'register',
        //     component: Register
        // },
        // {
        //     path: '/passwords/email',
        //     name: 'email',
        //     component: Email
        // },
//         {
//             path: '/single-page',
//             name: 'single-page',
//             component: SinglePage
//         }

    ]
})

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')

    if (to.matched.some(record => record.meta.requiredAuth) && !loggedIn) {
          next('/')
    } 
        next()
})

export default router