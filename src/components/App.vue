<template>
  <div class="appContainer">
    <app-header :routeChange="routeChange" />
    <router-view class="route" />
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
    props: {
      routeChange: Object
    }
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
  }

</style>
