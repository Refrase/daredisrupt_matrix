<template>
  <div class="appContainer">
    <app-header :routeChange="routeChange" />
    <router-view
      class="route"
      :class="{
        slideRight: routeChange.to ? routeChange.to.path === '/' : null,
        fadeInWithDelay: routeChange.to ? routeChange.to.path !== '/' : null,
      }"
      :routeChange="routeChange" />
    <app-footer />
  </div>
</template>

<script>
  import Header from '@/components/Header'
  import Footer from '@/components/Footer'
  export default {
    name: 'App',
    components: {
      'app-header': Header,
      'app-footer': Footer
    },
    data() {
      return {
        routeChange: {}
      }
    },
    created() {
      this.$bus.$on( 'routeChange', (routeChange) => { this.routeChange = routeChange })
    },
  }
</script>

<style lang="scss">
  @import '~@/styles/main';

  .appContainer {
    width: 100%;
    min-height: 100%;
  }

  .route {
    width: 100%;
    min-height: 100vh;
    padding-top: 144px; // Header on pages not 'matrix'
    // opacity: 0;
  }
</style>
