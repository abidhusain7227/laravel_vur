<script>
import navbarVue from '../../views/layout/navbar.vue';
import headerComponent from './header.vue';
import footerComponent from './footer.vue';
import fromComponent from './from.vue';
    export default {
        components:{
            navbarVue, headerComponent,footerComponent,fromComponent
        },
        data(){
            return {
                title:"test Title"
            }
        },
        mounted() {
            console.log(Math.random().toString().slice(2,8))
        },
        methods: {
            updateTitle(updatedTitle){
                this.title = updatedTitle;
            },
        }
    }
</script>
<template>
    <div>
        <navbarVue />

        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <headerComponent v-bind:title="title" v-on:changeTitle="updateTitle($event)" />
                        <div class="card-header" v-rainbow>Example Component</div>
                        <!-- Filter -->
                        <div class="card-header">{{ "Filter to upearcas" | to-uppercase}}</div>
                        <fromComponent>
                            <h1 slot="h1tag">{{ title }}</h1>
                            <p slot="ptag">ther is p tag</p>
                        </fromComponent>
                        <footerComponent v-bind:title="title" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


