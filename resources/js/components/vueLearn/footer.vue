<script>

export default {
    props: {
        title: {
            type: String
        }
    },
    data () {
        return{

        }
    },
    methods:{
    }
}
</script>



<template>
    <footer>
        <h1>@copy right abidhusain 2023{{ title }}</h1>
    </footer>
</template>

<style scoped>
footer{
    background-color: rgb(47, 46, 46);
    padding: 10px;
    border: 2px solid rgb(47, 46, 46);
    border-radius: 6px;
    margin:5px;
    color: white;
}
h1{
    font-size: 15px;
    margin-bottom: 0px !important;
}
</style>