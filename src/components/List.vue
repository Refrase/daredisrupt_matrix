<template>
  <ul class="list">
    <li v-for="(item, index) in items" class="item" :class="{ 'item-large': largeText }">{{ item }}</li>
  </ul>
</template>

<script>
  export default {
    name: 'List',
    props: {
      items: Array,
      largeText: Boolean
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

    &:before {
      content: '';
      position: absolute;
      left: -20px;
      top: 9px;
      width: 8px;
      height: 8px;
      background-size: contain;
      background-image: url( '../assets/images/list-dot.svg' );
    }

    &-large { font-size: $fontSize-xlarge; }
  }
</style>
