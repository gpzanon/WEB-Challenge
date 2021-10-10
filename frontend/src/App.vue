<template>
  <div id="app">
    <Navbar />
    <router-view/>
  </div>
</template>

<style lang="scss">
  #app {
    font-family: 'Montserrat', Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
    background-color: #eae9e9;
  }

  body {
    margin: 0;
  }
</style>
<script>
import Navbar from './components/Navbar'
export default {
  components: {
    Navbar
  }
}
</script>
