<template>
  <div class="appContainer"
    :style="{
      position: dropdownVisible ? 'fixed' : null,
      overflow: dropdownVisible ? 'hidden' : null,
      width: dropdownVisible && this.$route.name === 'x-axis' ? 'calc(100vw - 10px)' : null,
    }">
    <app-header :routeChange="routeChange" :class="{ headerRelative: dropdownVisible && this.$route.name === 'x-axis' }" />
    <loading-indicator v-if="loadingPage" />
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
  import LoadingIndicator from '@/components/LoadingIndicator'
  export default {
    name: 'App',
    components: {
      'app-header': Header,
      'app-footer': Footer,
      'loading-indicator': LoadingIndicator
    },
    data() {
      return {
        routeChange: {},
        dropdownVisible: false,
        loadingPage: null
      }
    },
    created() {
      this.$bus.$on( 'routeChange', (routeChange) => { this.routeChange = routeChange })
      this.$bus.$on( 'dropdownToggled', (dropdownVisible) => { this.dropdownVisible = dropdownVisible.visible })
      this.$bus.$on( 'loadingPage', (loadingPage) => { this.loadingPage = loadingPage })
    },
  }
</script>

<style lang="scss">
  @import '~@/styles/main';

  .appContainer {
    width: 100%;
    min-height: 100%;
  }

  .headerRelative .header { position: relative !important; } // Avoiding header jumping to the right when showing dropdown

  .route {
    width: 100%;
    min-height: 100vh;
    padding-top: 144px; // Header on pages not 'matrix'
  }
</style>
