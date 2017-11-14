<template>
  <div class="subheaderDot">
    <router-link :to="{ name: '', params: {} }">Kunstig intelligens, big data og robotter</router-link>
    <router-link :to="{ name: 'matrix' }">
      <img class="matrixlocation" src="../assets/icons/matrix-locations/matrixplacering-01.svg" alt="Placering i matrix">
    </router-link>
    <router-link :to="{ name: '', params: {} }">Arbejdsmarked og erhverv</router-link>
  </div>
</template>

<script>
  export default { name: 'SubheaderDot' }
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
      max-width: 160px;
      display: inline-block;
      &:first-child { text-align: right; }
      @include breakpoint('mobile') {
        max-width: 120px;
        font-size: $fontSize-xsmall;
      }
    }
  }
  .matrixlocation { position: relative; margin: 0 $scale-2-1; top: 2px; }
</style>
