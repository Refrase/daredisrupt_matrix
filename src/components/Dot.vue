<template>
  <router-link :to="{ name: 'dot', params: { id: linkParam } }">
    <span class="dot_shadow" ref="dotShadow"></span>
    <span class="dot" @click="dotClicked = !dotClicked" :class="{ 'dot-clicked': dotClicked }" />
  </router-link>
</template>

<script>
  import { TweenMax } from 'gsap'
  export default {
    name: 'Dot',
    props: { linkParam: String },
    data() {
      return {
        dotClicked: false
      }
    },
    mounted() {
      TweenMax.fromTo(
        this.$refs['dotShadow'],
        1.2,
        {
          boxShadow: "0px 0px 0px 0px rgba(16, 26, 57, 0.8)"
        },
        {
          boxShadow: "0px 0px 0px 18px rgba(16, 26, 57, 0)",
          repeat: -1,
          ease: Power4.EaseOut,
          delay: Math.random() * 3,
          repeatDelay: 2
        }
      )
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

    &.dot-clicked {
      z-index: $zindex-dotActive;
      opacity: 1;
      transform: scale(1);
    }

    &_shadow {
      position: absolute;
      border-radius: 100%;
      top: calc( 50% - 20px );
      left: calc( 50% - 20px );
      width: 40px;
      height: 40px;
    }
  }
</style>
