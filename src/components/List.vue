<template>
  <ul class="list">
    <li v-for="(item, index) in items" class="item" :class="{ 'item-large': largeText, 'item-ellipsis': ellipsis }">{{ item }}</li>
  </ul>
</template>

<script>
  export default {
    name: 'List',
    props: {
      items: Array,
      largeText: Boolean,
      ellipsis: Boolean
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  .list {
    list-style: none;
    list-style-position: inside;
  }
  .item {
    margin-bottom: $scale-2-1;
    position: relative;
    font-size: $fontSize-large;
    font-family: $fontFamily-serif;
    padding-left: $scale-3-1;

    &:before {
      content: '';
      position: absolute;
      left: 0;
      top: 9px;
      width: 8px;
      height: 8px;
      background-size: contain;
      background-position: bottom;
      background-repeat: no-repeat;
      background-image: url( '../assets/images/list-dot.svg' );
    }

    &-ellipsis {
      &:before {
        left: 0px;
        top: 11px;
        width: 16px;
        background-image: url( '../assets/images/list-dots.svg' );
      }
    }

    &-large { font-size: $fontSize-xlarge; }
  }
</style>
