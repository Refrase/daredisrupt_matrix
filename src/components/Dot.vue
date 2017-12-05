<template>
  <router-link :to="{ name: 'dot', params: { id: linkParam } }">
    <span class="dot_shadow"></span>
    <span class="dot" @click="dotClicked = !dotClicked" :class="{ 'dot-clicked': dotClicked }" />
  </router-link>
</template>

<script>
  export default {
    name: 'Dot',
    props: { linkParam: String },
    data() {
      return {
        dotClicked: false
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/zindexes';
  .dot {
    border-radius: 100%;
    width: 4000px;
    height: 4000px;
    background-color: white;
    cursor: pointer;
    z-index: $zindex-dot;
    position: absolute;
    top: -2000px;
    left: calc( 50% - 2000px );

    // Getting rid of flickering effect
    backface-visibility: hidden;
    perspective: 1000;

    transform: scale(0.01);
    transition: transform .3s ease-out;

    &:hover { transform: scale(0.012); }

    &.dot-clicked {
      z-index: $zindex-dotActive;
      transform: scale(1);
    }

    &_shadow {
      position: absolute;
      border-radius: 100%;
      top: calc( 50% - 40px );
      left: calc( 50% - 40px );
      width: 80px;
      height: 80px;
      background-color: $color-darkblue-darker-4;
      transform: scale(0) translate3d(0, 0, 0); // translate3d to trigger GPU rendering
      animation: pulseTwo 2s cubic-bezier(.17,.67,.57,.99) infinite;
    }
  }
</style>
