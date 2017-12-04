<template>
  <li>
    <span @click="showText = !showText" :class="{ expanded: showText }">{{ item.title }}</span>
    <p v-show="showText" v-html="item.text" />
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
    position: relative;
    width: 100%;
    background-color: $color-light;
    margin-top: 1px;
    text-align: left;
    font-weight: bold;
    line-height: 1.3;
    font-size: $fontSize-large;
    padding: $scale-2-1;
    padding-right: $scale-6-1;
    &:after {
      content: '+';
      position: absolute;
      font-size: 40px;
      font-weight: 100;
      color: lighten($color-darkblue-lighter-4, 9%);
      right: $scale-2-1;
      top: 50%;
      transform: translateY(-54%);
    }
    &.expanded:after { content: '-'; right: 21px; transform: translateY(-56%); }
    &:hover {
      background-color: darken($color-light, 2%);
    }
  }

  p { padding: $scale-2-1 $scale-2-1 $scale-4-1; }
</style>
