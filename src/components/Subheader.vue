<template>
  <div class="subheader" :style="{ position: isXAxis ? 'fixed' : 'absolute' }">
    <slot />
  </div>
</template>

<script>
  export default {
    name: 'Subheader',
    computed: { isXAxis() { return this.$route.name == 'x-axis' } }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/zindexes';

  .subheader {
    padding: $scale-3-1 0;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: $color-blue;
    z-index: $zindex-subheader;
    width: 100%;
    height: 93px;
    left: 0;
    top: 56px;
    transform: translate3d(0, -160px, 0);
    animation: slideDownSubheader .6s .3s forwards;
    @include breakpoint('tablet') { padding: $scale-2-1 0; }
  }

</style>
