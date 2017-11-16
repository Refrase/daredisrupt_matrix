<template>
  <li>
    <span @click="showText = !showText">{{ item.title }}</span>
    <p v-show="showText">{{ item.text }}</p>
  </li>
</template>

<script>
  export default {
    name: 'Accordion',
    props: { item: Object },
    data() {
      return {
        showText: false  
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/global';
  @import '~@/styles/animations';
  li:first-child span {
    border-top-left-radius: $borderRadius;
    border-top-right-radius: $borderRadius;
  }
  li:last-child span {
    border-bottom-left-radius: $borderRadius;
    border-bottom-right-radius: $borderRadius;
  }
  span {
    @extend .button;
    width: 100%;
    background-color: $color-light;
    margin-top: 1px;
    text-align: left;
    font-weight: bold;
    font-size: $fontSize-large;
    padding: $scale-2-1;
    &:hover {
      background-color: darken($color-light, 2%);
    }
  }

  p { padding: $scale-2-1 $scale-2-1 $scale-4-1; }
</style>
