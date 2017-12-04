<template>
  <div v-if="crosspointMeta" class="subheaderDot">
    <router-link :to="{ name: 'y-axis', params: { id: crosspointMeta.technology.value } }">{{ crosspointMeta.technology.label }}</router-link>
    <router-link :to="{ name: 'matrix' }" class="matrixlocation">
      <img
        v-if="crosspointMeta.matrixLocation"
        :src="crosspointMeta.matrixLocation"
        alt="Placering i matrix">
    </router-link>
    <router-link :to="{ name: 'x-axis', params: { id: crosspointMeta.area.value } }">{{ crosspointMeta.area.label }}</router-link>
  </div>
</template>

<script>
  export default {
    name: 'SubheaderDot',
    data() {
      return {
        crosspointMeta: null
      }
    },
    created() {
      this.$bus.$on( 'crosspointMeta', (crosspointMeta) => { this.crosspointMeta = crosspointMeta })
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/zindexes';
  .subheaderDot {
    display: flex;
    align-items: center;
    justify-content: center;

    a {
      font-size: $fontSize-small;
      display: block;
      width: 160px;
      display: inline-block;
      &:first-child { text-align: right; }
      @include breakpoint('mobile') {
        max-width: 120px;
        font-size: $fontSize-xsmall;
      }
    }
  }
  .matrixlocation {
    position: relative;
    margin: 0 $scale-2-1;
    top: 2px;
    width: 48px !important;

    img {
      width: 100%;
      animation: fadeIn .6s ease-out;
    }
  }
</style>
