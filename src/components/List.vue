<template>
  <ul class="list">
    <li
      v-for="(item, index) in items"
      class="item"
      :class="{ 'item-large': largeText, 'item-ellipsis': ellipsis }">
        <span v-if="htmlContent" v-html="itemKey ? item[itemKey] : item" />
        <span v-else>{{ itemKey ? item[itemKey] : item }}</span>
      </li>
  </ul>
</template>

<script>
  export default {
    name: 'List',
    props: {
      items: Array,
      itemKey: String,
      largeText: Boolean,
      ellipsis: Boolean,
      htmlContent: Boolean
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  .list {
    list-style: none;
    list-style-position: inside;
  }

  .item,
  .item /deep/ p {
    font-size: $fontSize-large;
    font-family: $fontFamily-serif;
  }

  .item {
    padding-left: $scale-3-1;
    position: relative;
    margin-bottom: $scale-2-1;

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
