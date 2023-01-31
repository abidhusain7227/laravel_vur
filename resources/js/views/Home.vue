
<script>
import navbarVue from './layout/navbar.vue';
import test from '../components/test.vue';
export default {
  components:{navbarVue, test},
  data () {
    return {
      rawHtml:'<span style="color: red">This should be red.</span>',
      activeClass: 'active',
      errorClass: 'text-danger',
      parentMessage: 'Parent',
      items: [{ message: 'Foo' }, { message: 'Bar' }],
      myObject: {
        title: 'How to do lists in Vue',
        author: 'Jane Doe',
        publishedAt: '2016-04-10'
    },
    numbers: [1, 2, 3, 4, 5],
    sets: [[ 1, 2, 3, 4, 5 ], [6, 7, 8, 9, 10]],
    message:'',
    checkedNames: ['Mike'],
    title:''
    }
  },
  mounted() {
      // this.$refs.message.focus();
  },
  methods : {
    even(numbers) {
      return numbers.filter(number => number % 2 ===  0)
    },
    ChangeT(title)
    {
      this.checkedNames=title;
    },
  },
  computed: {
    evenNumbers() {
      return this.numbers.filter(n => n % 2 === 0)
    }
  }
}
</script>

<template>
  <div>
    <navbarVue />
      <h1>Test Vue home</h1>
      <h1>{{ trans.get('__JSON__.welcome', {name:"abid"}) }}</h1>
      <p>Using text interpolation: {{ rawHtml }}</p>
      <p>Using v-html directive: <span v-html="rawHtml"></span></p>
      <div :class="[activeClass, errorClass]">ramu</div>
      <li v-for="(item, index) in items">
        {{ parentMessage }} - {{ index }} - {{ item.message }}
      </li>

      <ul>
        <li v-for="(value, key, index) in myObject">
          {{ index }}. {{ key }}: {{ value }}
        </li>
      </ul>
      <!-- evenNumbers -->
      <li v-for="n in evenNumbers">{{ n }}</li>
      <ul v-for="numbers in sets">
        <li v-for="n in even(numbers)">{{ n }}</li>
      </ul>

      <!-- Alt + Enter -->
      <input @keyup.alt.enter="clear" />

      <span>Multiline message is:</span>
      <p style="white-space: pre-line;">{{ message }}</p>
      <textarea v-model="message" ref="message" placeholder="add multiple lines"></textarea>

      <div>Checked names: {{ checkedNames }}</div>

      <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
      <label for="jack">Jack</label>

      <input type="checkbox" id="john" value="John" v-model="checkedNames">
      <label for="john">John</label>

      <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
      <label for="mike">Mike</label>
      <!-- Try Bootstrap -->
      <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
      </div>
      <!-- Try bootstrap-vue -->
      <b-card
        title="Card Title"
        img-src="https://picsum.photos/600/300/?image=25"
        img-alt="Image"
        img-top
        tag="article"
        style="max-width: 20rem;"
        class="mb-2"
      >
        <b-card-text>
        Some quick example text to build on the card title and make up the bulk of the card's content.
        </b-card-text>

        <b-button href="#" variant="primary">Go somewhere</b-button>
      </b-card>
      <div>
        <test :username="myObject" :checkedNames="checkedNames" @changeTitle="ChangeT($event)"/>
        
      </div>
      <h1>{{ title }}</h1>
  </div>

</template>

