<template>
  <div class="header">
    <div>
      <h1 class="headline">Kommunernes teknologiske fremtid - et værktøj til viden og dialog</h1>
      <p class="subheadline">KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid</p>
    </div>
  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  export default {
    name: 'Header',
    components: { 'grid-block': GridBlock },
    props: { routeChange: Object }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';

  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: $scale-3-1;
    color: white;
    background-color: $color-darkblue;
    min-height: 99px;
    @include breakpoint('tablet') { padding: $scale-2-1; }
  }

  .headline {
    line-height: 1.3;
    font-size: 22px;
    @include breakpoint('tablet') { font-size: 16px; }
  }

  .subheadline {
    font-family: $fontFamily-serif;
    font-style: italic;
    font-size: 14px;
    margin-top: $scale;
    @include breakpoint('tablet') { font-size: 12px; }
  }
</style>
