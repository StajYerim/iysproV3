<template>
  <div id="app">
    <img  style="width:120px;" src="./assets/logo.png">
      <vue-snotify></vue-snotify>
<div class="hello">
    <router-link to="/">Anasayfa</router-link>
    <router-link to="/login">Giriş Yap</router-link>
</div>
   <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
