<script>
export default {
  mounted() {
    alert('hello contact')
  }
}
</script>

<template>
    <div>
        <h1>Test Vue contect</h1>
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
    </div>
  </template>
  
 
  
  <style>
  
  </style>