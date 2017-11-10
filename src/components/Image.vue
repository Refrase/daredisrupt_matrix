<template>
  <div class="image"
    :style="{
      backgroundImage: 'url(' + url + ')',
      height: height + 'px'
    }" />
</template>

<script>
  export default {
    name: 'Image',
    props: {
      url: String,
      height: null
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  .image {
    display: block;
    position: absolute;
    border-radius: $borderRadius;
    width: calc( 100% - #{$scale-4-1} );
    min-height: 200px;
    background-position: top;
    background-size: cover;
    background-repeat: no-repeat;
    @include breakpoint('mobile') { display: none; }
  }
</style>
