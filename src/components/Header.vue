<template>
  <grid-block noPadding class="header">
    <div class="span-5">
      <!-- <appMenu :routeChange="routeChange" /> -->
    </div>
  </grid-block>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  // import Menu from '@/components/Menu'
  export default {
    name: 'Header',
    components: {
      'grid-block': GridBlock,
      // 'appMenu': Menu
    },
    props: { routeChange: Object }
  }
</script>

<style lang="scss" scoped>
  .header {}
</style>
