import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/people',
            component: () => import('./components/Person/Index'),
            name: 'person.index'
        },
        {
            path: '/people/create',
            component: () => import('./components/Person/Create'),
            name: 'person.create'
        },
        {
            path: '/people/:id/edit',
            component: () => import('./components/Person/Edit'),
            name: 'person.edit'
        },
        {
            path: '/people/:id',
            component: () => import('./components/Person/Show'),
            name: 'person.show'
        },
        {
            path: '/user/login',
            component: () => import('./components/User/Login'),
            name: 'user.login'
        },
        {
            path: '/user/registration',
            component: () => import('./components/User/Registration'),
            name: 'user.registration'
        },
        {
            path: '/user/personal',
            component: () => import('./components/User/Personal'),
            name: 'user.personal'
        },


    ]
})

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')
    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }
    if (to.name === 'user.login' || to.name === 'user.registration' && token) {
        return next({
            name: 'user.personal'
        })
    }
    next()
})


export default router
