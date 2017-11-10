<template>
  <div class="card"
    :class="{
      'card-light': backgroundColor == 'light',
      'card-illustration': illustrationUrl,
      'card-button': linkUrl,
      'card-withSplitter': withSplitter,
    }"
    :style="{ paddingTop: illustration }">
    <div v-if="imageUrl" class="imageWrap">
      <img class="image" :src="imageUrl" :alt="imageAlt ? imageAlt : null" />
    </div>
    <img v-if="illustrationUrl" class="illustration" :src="illustrationUrl" :alt="illustrationAlt ? illustrationAlt : null" />
    <div class="content" :class="{ 'content-illustration': illustrationUrl }">
      <h2 class="headline">{{ headline }}</h2>
      <list v-if="items" :items="items" />
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
      text: String,
      linkUrl: String,
      linkLabel: String,
      linkIntro: String,
      backgroundColor: String,
      withSplitter: Boolean,
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

    @include breakpoint( 'mobile' ) {
      margin-left: -$scale-4-1;
      width: calc( 100% + #{$scale-8-1} );
      border-radius: 0;
    }

    &-withSplitter {
      &:before,
      &:after {
        content: '';
        position: absolute;
        top: calc(100% - 32px);
        background-color: $color-light;
        height: 16px;
        width: 100%;
      }

      &:before { right: 100%; }
      &:after { left: 100%; }
    }

    &-light { background-color: $color-light; color: $color-darkblue; }
    &-illustration {
      @include breakpoint( 'mobile' ) {
        margin-top: 40px;
        padding-top: 100px;
      }
    }
    &-button {
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
  }

  .imageWrap {
    border-top-left-radius: $borderRadius;
    border-top-right-radius: $borderRadius;
    overflow: hidden;
    height: 400px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    * { width: 100%; }
    @include breakpoint( 'mobile' ) { height: 250px; }
  }

  .illustration {
    position: absolute;
    right: $scale-4-1;
    top: -100px;
    width: 240px;
    max-width: 40%;
    @include breakpoint( 'mobile' ) {
      width: 160px;
      top: -60px;
    }
    @include breakpoint( 'custom', '480px' ) {
      left: 50%;
      transform: translate( -50% );
    }
  }

  .headline {
    color: $color-darkblue-darker-2;
    margin-bottom: $scale-4-1;
    @include breakpoint( 'tablet' ) {
      margin-bottom: $scale-2-1;
    }
  }

  .content {
    padding: $scale-6-1 $scale-8-1;
    @include breakpoint( 'tablet' ) { padding: $scale-4-1 $scale-6-1; }
    &-illustration {
      width: 60%;
      @include breakpoint( 'mobile' ) { width: 80%; }
      @include breakpoint( 'custom', '480px' ) { width: 100%; }
    }
  }

  .linkWrap {
    position: absolute;
    top: 100%;
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
