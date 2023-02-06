<script>
import Language from '../../components/Language.vue';
export default {
    components : { Language },
    methods: {
        logout(){
            this.$auth.logout();
        },
        initFullScreen() {
            document.body.classList.toggle("fullscreen-enable");
            if (
                !document.fullscreenElement &&
                /* alternative standard method */ !document.mozFullScreenElement &&
                !document.webkitFullscreenElement
            ) {
                // current working methods
                if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(
                    Element.ALLOW_KEYBOARD_INPUT
                );
                }
            } else {
                if (document.cancelFullScreen) {
                document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
                }
            }
        }
    }
    
};
</script>
<template>
    <div>
        <b-navbar type="dark" variant="dark">
            <b-navbar-nav>
                <router-link to="/" class="nav-link" exact>Home</router-link>
                <router-link :to="{ name: 'about' }" exact class="nav-link">About</router-link>
                <router-link :to="{ name: 'vueLearn' }" exact class="nav-link">VueLearn</router-link>
                <router-link :to="{ name : 'employe'}" exact class="nav-link">Employe</router-link>
                <router-link :to="{ name : 'login'}" exact class="nav-link">Login</router-link>
                <!-- <b-nav-item-dropdown text="Lang" right>
                    <b-dropdown-item href="#">EN</b-dropdown-item>
                    <b-dropdown-item href="#">ES</b-dropdown-item>
                    <b-dropdown-item href="#">RU</b-dropdown-item>
                    <b-dropdown-item href="#">FA</b-dropdown-item>
                </b-nav-item-dropdown>

                <b-nav-item-dropdown text="User" right>
                    <b-dropdown-item href="#">Account</b-dropdown-item>
                    <b-dropdown-item href="#">Settings</b-dropdown-item>
                </b-nav-item-dropdown> -->
                <button class="badge badge-success" @click="logout">logout</button>
                <button class="badge badge-success ml-1" @click="initFullScreen">FullScreen</button>
                
                <div>
                    <Language />
                </div>
            </b-navbar-nav>
        </b-navbar>
    </div>
</template>

<style scoped>
    .router-link-active{
        background-color: #9ea2a7;
        color: black;
        font-weight: 600;
        font-size: 15px;
        border-radius: 10px;
        margin-bottom: 4px !important;
    }
</style>