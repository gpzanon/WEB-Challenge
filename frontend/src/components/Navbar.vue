<template>
<header>
  <div>
    <h5>Fullstack</h5>
  </div>
  <div></div>
</header>
</template>

<script>
export default {
  name: 'Navbar'
}
</script>

<style scoped>
  header {
    background-color: #364147;
    color: #fff;
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
  }

  header div {
    display: flex;
    align-items: center;
    padding: 15px 50px;
  }

  header div h5 {
    letter-spacing: 3px;
    text-transform: uppercase;
    margin: 0;
  }
</style>
