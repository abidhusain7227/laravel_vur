<script>

export default {
    data () {
        return{
            locale:localStorage.getItem('locale') || this.trans.getLocale(),
        }
    },

    mounted () {
    },

    methods:{
        changeLanguage(obj){
            localStorage.setItem('locale',obj.target.value)
            this.trans.setLocale(obj.target.value);
            window.location.reload();
        }
    }
}
</script>

<style scoped>
    select{
        border: 1px solid;
        border-radius: 5px;
        background: transparent;
        color: wheat;
        position: relative;
    }
    div{
        display: flex;
        margin: 10px;
    }
</style>

<template>
    <div>
        <select v-model="locale" @change="changeLanguage">
            <option value="en">{{ trans.get('__JSON__.English') }}</option>
            <option value="hn">{{ trans.get('__JSON__.Hindi') }}</option>
            <option value="gu">{{ trans.get('__JSON__.Gujarati') }}</option>
        </select>
    </div>
</template>
