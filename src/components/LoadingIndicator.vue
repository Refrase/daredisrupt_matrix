<template>
  <div class="loadingIndicator">
    <h1>
      <span class="iLetterDotHide" />
      Henter indhold
      <span class="newILetterDot">.</span>
    </h1>
  </div>
</template>

<script>
  export default { name: 'LoadingIndicator' }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/animations';
  .loadingIndicator {
    position: absolute;
    top: calc( 50vh - 100px );
    width: 100%;
    text-align: center;
    animation: fadeIn 1s ease-out;
  }

  h1 { position: relative; }

  .iLetterDotHide {
    display: block;
    position: absolute;
    width: 8px;
    height: 8px;
    background-color: white;
    left: 50%;
    top: 8px;
  }

  @keyframes fadeInAndSlideDownEllipsisDot {
    0% { transform: translate3d(0, -30px, 0) scaleY(1.1); }
    30% { transform: translate3d(0, 0, 0) scaleY(0.6); }
    100% { transform: translate3d(0, -30px, 0) scaleY(1.1); }
  }

  .newILetterDot {
    display: block;
    position: relative;
    bottom: 53px;
    left: 4px;
    animation: fadeInAndSlideDownEllipsisDot .8s cubic-bezier(.65,.47,0,.85) infinite;
  }

</style>
