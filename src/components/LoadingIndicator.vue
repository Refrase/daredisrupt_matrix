<template>
  <p class="loadingIndicator">
    <span class="iLetterDotHide" />
    Henter indhold
    <span class="newILetterDot">.</span>
  </p>
</template>

<script>
  export default { name: 'LoadingIndicator' }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/animations';
  .loadingIndicator {
    font-size: $fontSize-xxxlarge;
    font-family: $fontFamily-serif;
    font-weight: bold;
    position: absolute;
    top: calc( 50vh - 100px );
    width: 100%;
    text-align: center;
    animation: fadeIn 1s ease-out;
  }

  .iLetterDotHide {
    display: block;
    position: absolute;
    width: 8px;
    height: 8px;
    background-color: white;
    left: 50%;
    top: 12px;
  }

  @keyframes fadeInAndSlideDownEllipsisDot {
    0% { transform: translate3d(0, -30px, 0) scaleY(1.1); }
    30% { transform: translate3d(0, 0, 0) scaleY(0.6); }
    100% { transform: translate3d(0, -30px, 0) scaleY(1.1); }
  }

  .newILetterDot {
    display: block;
    position: relative;
    bottom: 56px;
    left: 4px;
    animation: fadeInAndSlideDownEllipsisDot .8s cubic-bezier(.65,.47,0,.85) infinite;
  }

</style>
