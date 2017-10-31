<template>
  <div v-if="visible" class="dropdown">
    <grid-block>
      <div class="span-8 offset-2">
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
    props: { visible: Boolean }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/zindexes';
  .dropdown {
    position: absolute;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    // box-shadow: 0px 0px 0px 10000px rgba($color-darkblue-darker-2, 0.9);
    z-index: $zindex-dropdown;
    background-color: rgba($color-yellow, 0.97);
    color: $color-yellow-darker-4;
    padding-top: $headerHeight + $scale-4-1;
    padding-bottom: $scale-6-1;

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
