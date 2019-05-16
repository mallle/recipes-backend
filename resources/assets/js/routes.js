import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./views/Recipes.vue')
    },

    {
        path: '/about',
        component: require('./views/About')
    },

    {
        path: '/contact',
        component: require('./views/Contact')
    },

    {
        path: '/exp',
        component: require('./views/Exp')
    }
];

export default new VueRouter({
    routes,
    linkActiveClass: 'is-active'
});