import Vue from 'vue';
import Router from 'vue-router';
import Home from '@/js/views/Home';
import vueLearn from './components/vueLearn/home.vue';
import About from '@/js/views/About';
import pageNotfound from "@/js/views/pagenotfound";
import Employe from "./views/Employe/employe_list.vue";
import Employe_add from "./views/Employe/add.vue";
import Employe_edit from './views/Employe/edit.vue';
import Login from './views/auth/login.vue';

Vue.use(Router);

const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '*',
            name: '404',
            component: pageNotfound
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/vueLearn',
            name: 'vueLearn',
            component: vueLearn,
            meta:{ title: 'vue Learn'}
        },
        {
            path: '/employe',
            name: 'employe',
            component: Employe,
            meta: { title: 'Employe' }
        },
        {
            path: '/employe/add',
            name: 'employe/add',
            component: Employe_add,
            meta: { title: 'Add Employe' }
        },
        {
            path: '/employe/edit/:employeId',
            name: '/employe/edit',
            component: Employe_edit,
            meta: { title: 'Edit Employe' }
        }
    ]
});

router.beforeEach((to, from, next) => {
    var isAuthenticated = Vue.prototype.$auth.logging_done
    if (to.name !== 'login' && !isAuthenticated){
        next({ name: 'login' })  
    }else if(to.name == 'login' && isAuthenticated){
        next({ name: 'home' })
    }else{
        next()
    }
     
  })

const DEFAULT_TITLE = 'Lravel_Vue';
router.afterEach((to, from) => {
    Vue.nextTick(() => {
        document.title = to.meta.title || DEFAULT_TITLE;
    });
});
export default router;