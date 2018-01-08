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
    -webkit-overflow-scrolling: touch;
    animation: fadeIn .15s ease-out, slideDownSubheader .3s $animationBezier-easeOut-extreme;

    // Avoiding content being hidden behind the bottom tab bar on iOS safari
    /* All iOS phones in portrait and landscape */
    /* ----------- iPhone 5, 5S, 5C and 5SE ----------- */
    @media only screen
      and (min-device-width: 320px)
      and (max-device-width: 568px)
      and (-webkit-min-device-pixel-ratio: 2) { height: calc(100vh - 44px) !important; }
    /* ----------- iPhone 6, 6S, 7 and 8 ----------- */
    @media only screen
      and (min-device-width: 375px)
      and (max-device-width: 667px)
      and (-webkit-min-device-pixel-ratio: 2) { height: calc(100vh - 44px) !important; }
    /* ----------- iPhone 6+, 7+ and 8+ ----------- */
    @media only screen
      and (min-device-width: 414px)
      and (max-device-width: 736px)
      and (-webkit-min-device-pixel-ratio: 3) { height: calc(100vh - 44px) !important; }
    /* ----------- iPhone X ----------- */
    @media only screen
      and (min-device-width: 375px)
      and (max-device-width: 812px)
      and (-webkit-min-device-pixel-ratio: 3) { height: calc(100vh - 104px) !important; }

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
