<template>
  <div v-if="visible" class="dropdown">
    <grid-block noPadding>
      <div class="span-6 offset-3" :class="{ 'span-12 margin-none': fullWidth }">
        <slot />
      </div>
    </grid-block>
  </div>
</template>

<script>
import GridBlock from '@/components/GridBlock'
  export default {
    name: 'Dropdown',
    components: { 'grid-block': GridBlock },
    props: {
      visible: Boolean,
      fullWidth: Boolean
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/zindexes';
  .dropdown {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: $zindex-dropdown;
    background-color: rgba($color-yellow, 0.98);
    color: $color-yellow-darker-3;
    padding-top: $headerHeight + $scale-6-1;
    padding-bottom: $scale-6-1;
    overflow-y: scroll;
    animation: fadeIn .15s ease-out, slideDownSubheader .3s $animationBezier-easeOut-extreme;

    &:after {
      content: ' \2715';
      position: absolute;
      right: $scale-4-1;
      font-size: $fontSize-xlarge;
      top: $headerHeight + $scale-3-1;
      cursor: pointer;
    }
  }
</style>
