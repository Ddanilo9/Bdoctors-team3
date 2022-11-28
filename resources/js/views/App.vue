<template>
  <div>

    <router-view></router-view>

  </div>
</template>
  
  <script>

import Home from "../pages/Home.vue";
// import NavBar from "../components/NavBar.vue";

export default {
  components: {
    // NavBar,
    Home,
  },
};
</script>
  
  <style lang="scss" scoped>
</style>