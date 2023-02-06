<script>

export default {
    props: {
        title: {
            type: String
        }
    },
    data () {
        return{
            testTitle:this.title
        }
    },
    methods:{
        changeTitle(){
            this.$emit('changeTitle',this.testTitle)
        }
    }
}
</script>



<template>
    <div>
        <header v-rainbow="'background-color'">
            <div class="text-center">
                <h1  >{{ title }}</h1>
            </div>
        </header>
        <input type="text" name="" id="" v-model="testTitle" class="form-control">
      <button type="button" class="btn btn-primary m-1" @click='changeTitle'> Update me</button>
    </div>
</template>

<style scoped>

header{
    /* background-color: pink; */
    padding: 10px;
    border: 2px solid pink;
    border-radius: 6px;
    margin:5px;
}
</style>
