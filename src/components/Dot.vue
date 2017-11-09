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
      top: calc( 50% - 20px );
      left: calc( 50% - 20px );
      width: 40px;
      height: 40px;
      box-shadow: 0 0 0 0 rgba($color-darkblue-darker-4, 0.4);
      animation: pulse 2s infinite;
    }
  }
</style>
