<template>
  <div class="card"
    :class="{
      'card-light': backgroundColor == 'light',
      'card-white': backgroundColor == 'white',
      'card-illustration': illustrationUrl,
      'card-button': linkUrl,
      'card-withSplitter': withSplitter,
      'card-fullWidthMobile': fullWidthMobile,
    }">
    <div v-if="imageUrl" class="image" :style="{ backgroundImage: 'url(' + imageUrl + ')' }" />
    <img v-if="illustrationUrl" class="illustration" :src="illustrationUrl" :alt="illustrationAlt ? illustrationAlt : null" />
    <div class="content" :class="{ 'content-illustration': illustrationUrl }">
      <h2 class="headline">{{ headline }}</h2>
      <list v-if="items" :items="items" :itemKey="itemKey" :htmlContent="htmlContent" />
      <p v-if="text">{{ text }}</p>
    </div>
    <a v-if="linkUrl && linkLabel" class="linkWrap" :href="linkUrl">
      <span class="linkIntro" v-if="linkIntro">{{ linkIntro }}</span>
      <span class="button">{{ linkLabel }}</span>
    </a>
  </div>
</template>

<script>
  import List from '@/components/List'
  export default {
    name: 'Card',
    components: { list: List },
    props: {
      imageUrl: String,
      imageAlt: String,
      illustrationUrl: String,
      illustrationAlt: String,
      headline: String,
      items: Array,
      itemKey: String,
      htmlContent: Boolean,
      text: String,
      linkUrl: String,
      linkLabel: String,
      linkIntro: String,
      backgroundColor: String,
      withSplitter: Boolean,
      fullWidthMobile: Boolean,
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/global';

  .card {
    position: relative;
    width: 100%;
    background-color: $color-blue;
    color: white;
    border-radius: $borderRadius;

    &-fullWidthMobile {
      @include breakpoint( 'mobile' ) {
        margin-left: -$scale-4-1;
        width: calc( 100% + #{$scale-8-1} );
        border-radius: 0;
      }
    }

    &-withSplitter {
      &:before,
      &:after {
        content: '';
        position: absolute;
        top: calc(100% - 37px);
        background-color: $color-light;
        height: 12px;
        width: 100%;
      }

      &:before { right: 100%; }
      &:after { left: 100%; }
    }

    &-light { background-color: $color-light; color: $color-darkblue; }
    &-white { background-color: white; color: $color-darkblue; }
    &-illustration {
      @include breakpoint( 'custom', '480px' ) {
        margin-top: 40px;
        padding-top: 80px;
      }
    }
    &-button { padding-bottom: $scale-6-1; }
  }

  .image {
    border-top-left-radius: $borderRadius;
    border-top-right-radius: $borderRadius;
    height: 250px;
    background-position: top;
    background-size: cover;
  }

  .illustration {
    position: absolute;
    right: $scale-4-1;
    top: -100px;
    width: 240px;
    max-width: 40%;
    @include breakpoint( 'mobile' ) {
      width: 140px;
      max-width: auto;
      top: -60px;
    }
    @include breakpoint( 'custom', '480px' ) {
      left: 50%;
      transform: translate( -50% );
    }
  }

  .headline {
    color: $color-darkblue-darker-2;
    margin-bottom: $scale-2-1;
  }

  .content {
    padding: $scale-6-1 $scale-8-1;
    @include breakpoint( 'tablet' ) { padding: $scale-4-1 $scale-6-1; }
    &-illustration {
      width: 60%;
      @include breakpoint( 'custom', '480px' ) { width: 100%; }
    }
  }

  .linkWrap {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    border-bottom-left-radius: $borderRadius;
    border-bottom-right-radius: $borderRadius;
    background-color: inherit;
    overflow: hidden;
    &:hover {
      .button { background-color: darken($color-yellow, 2%);}
    }
  }

  .linkIntro {
    @extend .a;
    display: block;
    width: 100%;
    text-align: center;
    margin-bottom: $scale;
    &:hover { color: $color-yellow; }
  }

  .button {
    @extend .button;
    width: 100%;
  }

</style>
