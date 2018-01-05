<template>
  <div class="headerInner">

    <div v-if="isMatrix" class="headerInner_left">
      <h1 class="headline">Kommunernes teknologiske fremtid<br class="show-tabletOnly hide-mobile"><span class="hide-mobile"> &ndash; et værktøj til viden og dialog</span></h1>
      <p class="subheadline hide-mobile">KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid</p>
    </div>
    <div v-else class="headerInner_left">
      <router-link :to="{ name: 'matrix' }" class="display-flex alignItems-center margin-top-1-2">
        <img src="../assets/images/icon-spilleplade-on-button.svg" height="24" class="margin-right display-inlineBlock" />
        <span class="buttonBackLabel">Oversigt</span>
      </router-link>
    </div>

    <div class="headerInner_right">
      <div :style="{ minWidth: '120px' }">
        <a href="https://www.daredisrupt.com/" target="_blank" class="logo logo-daredisrupt margin-top-1-2 hide-mobile">
          <img src="../assets/images/logo-daredisrupt-white.png" alt="Logo: DareDisrupt" height="19" />
        </a>
        <a href="http://kl.dk/" target="_blank" class="logo logo-kl margin-top-1-2" v-if="!isMatrix">
          <img src="../assets/images/logo-kl-white.svg" alt="Logo: KL" height="16" />
        </a>
        <social-links class="float-right margin-bottom margin-top-1-2" />
      </div>
      <dropdown-toggle v-if="isMatrix" @click.native="dropdownToggled" label="Om kortlægningen" />
    </div>

  </div>
</template>

<script>
  import SocialLinks from '@/components/SocialLinks'
  import DropdownToggle from '@/components/DropdownToggle'
  import DropdownMatrix from '@/components/DropdownMatrix'
  export default {
    name: 'Header',
    components: {
      'social-links': SocialLinks,
      'dropdown-toggle': DropdownToggle,
      'dropdown-matrix': DropdownMatrix
    },
    computed: {
      isMatrix() { return this.$route.name === 'matrix' }
    },
    methods: {
      dropdownToggled() { this.$emit( 'dropdownToggled' ) }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/zindexes';

  .headerInner {
    width: 100%;

    &_left {
      float: left;
      display: inline-block;
      @include breakpoint( 'tablet' ) { width: 100vw; max-width: 60%; }
      @include breakpoint( 'custom', '400px' ) { max-width: 30%; }
    }

    &_right {
      display: inline-block;
      float: right;
    }
  }

  .headline,
  .subheadline {
    opacity: 0;
    animation: fadeIn .3s .6s ease-out forwards;
  }

  .headline {
    line-height: 1.3;
    font-size: 22px;
    @include breakpoint('tablet') {
      max-width: 80%;
      font-size: 20px;
      line-height: 1.5;
    }
    @include breakpoint('custom', '500px') { font-size: 16px; }
  }

  .subheadline {
    font-family: $fontFamily-serif;
    font-style: italic;
    font-size: 14px;
    margin-top: $scale;
    @include breakpoint('tablet') { display: none; }
  }

  .buttonBackLabel {
    display: inline-block;
    @include breakpoint('custom', '400px') { display: none; }
  }

  .logo {
    display: block;
    position: relative;
    top: 3px;
    margin-left: $scale-2-1;
    float: right;

    &-kl {
      @include breakpoint('mobile') { height: 14px; }
      @include breakpoint('custom', '374px') { height: 10px; }
    }

    &-daredisrupt {
      @include breakpoint('mobile') { height: 17px; margin-bottom: $scale; }
      @include breakpoint('custom', '374px') { height: 12px; }
    }
  }
</style>
