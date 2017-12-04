<template>
  <p class="dropdownToggle a">{{ label }}</p>
</template>

<script>
  export default {
    name: 'DropdownToggle',
    props: { label: String }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/helpers';

  .dropdownToggle {
    clear: both;
    white-space: nowrap;
    text-align: right;
    font-size: 14px;
    margin-top: $scale-1-2;

    &:after {
      content: ' \0002C5';
      display: inline-block;
      margin-left: 6px;
      font-size: 20px;
      line-height: 0.8;
      transform: translateY(8px) scaleX(1.2);
    }
  }
</style>
