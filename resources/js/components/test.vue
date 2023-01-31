<script>

export default {
    props: {
        username: Object ||Array|| Number || String,
        checkedNames:Array
    },
    data () {
        return{

        }
    },

    mounted () {
        console.log('checkedNames')
        console.log(this.checkedNames)
    },
    updated (){
        console.log('checkedNames')
        console.log(this.checkedNames)
        this.$emit('changeTitle',this.checkedNames)
        this.checkedNames = this.checkedNames
    },

    methods:{
        passEvent(){
        }
    }
}
</script>



<template>
    <div>
        <h1>hello{{ username }}</h1>
        <div v-for=" (value , key, index) in username">
            <h3>
                {{ value + key+index}}
            </h3>
            <h4>{{ key }}</h4>
        </div>
        <div>Checked names: {{ checkedNames }}</div>

      <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
      <label for="jack">Jack</label>

      <input type="checkbox" id="john" value="John" v-model="checkedNames">
      <label for="john">John</label>

      <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
      <label for="mike">Mike</label>
      <button type="button" @click='passEvent'> Update me</button>
    </div>
</template>
