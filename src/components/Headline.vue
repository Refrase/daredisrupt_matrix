<template>
  <div class="headline">
    <span v-if="watermark" class="watermark">{{ watermark }}</span>
    <h1 class="margin-bottom-4-1">{{ headline }}</h1>
  </div>
</template>

<script>
  export default {
    name: 'HeaderWatermark',
    props: {
      items: Array,
      watermark: String,
      headline: String
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  .watermark {
  	display: block;
  	font-family: $fontFamily-serif;
  	font-weight: bold;
  	font-size: 100px;
  	color: $color-light;
  	line-height: 1;
  	margin-bottom: -32px;
  	margin-left: -16px;

  	@include breakpoint( 'mobile' ) {
  		font-size: 48px;
  		margin-bottom: -18px;
  		margin-left: -6px;
  	}
  }
</style>
