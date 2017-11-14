<template>
  <div class="headline" :class="{ 'headline-center': center, 'headline-white': white, 'headline-yellow': yellow }">
    <span v-if="watermark" class="watermark">{{ watermark }}</span>
    <h1 v-if="headline" class="margin-bottom-4-1" v-html="headline" /></h1>
  </div>
</template>

<script>
  export default {
    name: 'Headline',
    props: {
      watermark: String,
      headline: String,
      center: Boolean,
      white: Boolean,
      yellow: Boolean
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  .headline {
    width: 100%;

    &-center { text-align: center; }
    &-white { * { color: white !important; }}
    &-yellow { * { color: $color-yellow !important; }}

    h1 { line-height: 1.2; }
  }
  .watermark {
  	display: block;
  	font-family: $fontFamily-serif;
  	font-weight: bold;
  	font-size: 100px;
  	color: $color-light;
  	line-height: 1;
  	margin-bottom: -26px;
  	margin-left: -16px;

    @include breakpoint( 'tablet' ) { font-size: 84px;  }
  	@include breakpoint( 'mobile' ) { font-size: 48px; margin-bottom: -8px; margin-left: 0px; }
    @include breakpoint( 'custom', '400px' ) { font-size: 36px; }
  }
</style>
