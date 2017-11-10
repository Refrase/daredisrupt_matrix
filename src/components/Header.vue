<template>
  <div>
    <div class="header"
      :style="{
        height: !isMatrix ? '56px' : '99px',
        padding: !isMatrix ? '16px 0' : null
      }">
      <grid-block noPadding>
        <div class="span-12 display-flex justifyContent-spaceBetween alignItems-center margin-none">
          <div v-if="isMatrix">
            <h1 class="headline">Kommunernes teknologiske fremtid - et værktøj til viden og dialog</h1>
            <p class="subheadline">KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid</p>
          </div>
          <div v-else>
            <router-link :to="{ name: 'matrix' }" class="display-flex alignItems-center">
              <img src="../assets/icons/icon-spilleplade-on-button.svg" alt="Logo: Dare Disrupt" height="24" class="margin-right display-inlineBlock" />
              <span class="buttonBackLabel">Oversigt</span>
            </router-link>
          </div>
          <div>
            <div :style="{ minWidth: '210px' }">
              <img src="../assets/images/logo-daredisrupt-white.png" alt="Logo: Dare Disrupt" height="19" class="logo logo-daredisrupt" />
              <img v-if="!isMatrix" src="../assets/images/logo-kl-white.svg" alt="Logo: KL" height="16" class="logo logo-kl" />
              <div class="socialLinks">
                <a href="https://www.linkedin.com/company/kl">
                  <img src="../assets/icons/icon-linkedin.svg" alt="LinkedIn" height="18" />
                </a>
                <a href="https://www.facebook.com/kommunerne/?rf=184003641627713">
                  <img src="../assets/icons/icon-facebook.svg" alt="Facebook" height="18" />
                </a>
                <a href="https://twitter.com/kommunerne?lang=en">
                  <img src="../assets/icons/icon-twitter.svg" alt="Twitter" height="18" />
                </a>
              </div>
            </div>
            <p v-if="isMatrix" class="dropdownToggle a" @click="dropdownVisible = !dropdownVisible">Om kortlægningen</p>
          </div>
        </div>
      </grid-block>
    </div>
    <div v-if="!isMatrix" class="subheader">
      <div v-if="isDot" class="subheader-dot">
        <router-link :to="{ name: '', params: {} }">Kunstig intelligens, big data og robotter</router-link>
        <router-link :to="{ name: 'matrix' }">
          <img class="matrixlocation" src="../assets/icons/matrix-locations/matrixplacering-01.svg" alt="Placering i matrix">
        </router-link>
        <router-link :to="{ name: '', params: {} }">Arbejdsmarked og erhverv</router-link>
      </div>
      <grid-block v-if="!isDot" noPadding>
        <div class="span-12 margin-none">
          <div class="subheader-axis">
            <h1 class="subheader-axis_title">Arbejdsmarked og erhverv</h1>
            <p class="dropdownToggle a margin-none" @click="dropdownTechnologicalThemesVisible = !dropdownTechnologicalThemesVisible">De 5 teknologiske temaer</p>
          </div>
        </div>
      </grid-block>
    </div>
    <dropdown v-if="isMatrix"
      @click.native="dropdownVisible = !dropdownVisible"
      :visible="dropdownVisible">
      <h1>Test</h1>
      <p>Indhold...</p>
    </dropdown>
    <dropdown class="dropdown-axis" v-if="isXAxis"
      @click.native="dropdownTechnologicalThemesVisible = !dropdownTechnologicalThemesVisible"
      :visible="dropdownTechnologicalThemesVisible">
      <h1>De 5 teknologiske temaer</h1>
      <p>Indhold...</p>
    </dropdown>
  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  import Dropdown from '@/components/Dropdown'
  export default {
    name: 'Header',
    components: {
      'grid-block': GridBlock,
      dropdown: Dropdown
    },
    props: { routeChange: Object },
    data() {
      return {
        dropdownVisible: false,
        dropdownTechnologicalThemesVisible: false
      }
    },
    computed: {
      isMatrix() { return this.$route.name === 'matrix' },
      isDot() { return this.$route.name === 'dot' },
      isXAxis() { return this.$route.name === 'x-axis' }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/zindexes';

  .header,
  .subheader {
    padding: $scale-3-1 0;
    @include breakpoint('tablet') { padding: $scale-2-1 0; }
  }

  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    color: white;
    background-color: $color-darkblue;
    height: 99px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: $zindex-header;
    transition: height .6s ease-out;
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
      font-size: 16px;
    }
    @include breakpoint('mobile') {
      font-size: 14px;
    }
  }

  .subheadline {
    font-family: $fontFamily-serif;
    font-style: italic;
    font-size: 14px;
    margin-top: $scale;
    @include breakpoint('tablet') {
      max-width: 80%;
      font-size: 12px;
    }
    @include breakpoint('mobile') { display: none; }
  }

  .buttonBackLabel {
    display: inline-block;
    @include breakpoint('custom', '479px') { display: none; }
  }

  .socialLinks {
    position: relative;
    float: right;
    @include breakpoint('mobile') { top: 2px; }
    img { margin-left: $scale-1-2; }
  }

  .logo {
    display: block;
    position: relative;
    top: 1px;
    margin-left: $scale-2-1;
    float: right;
    @include breakpoint('mobile') { top: 4px; }
    @include breakpoint('custom', '374px') { top: 6px; }
    &-kl {
      @include breakpoint('mobile') { height: 14px; }
      @include breakpoint('custom', '374px') { height: 10px; }

    }
    &-daredisrupt {
      @include breakpoint('mobile') { height: 17px; }
      @include breakpoint('custom', '374px') { height: 12px; }
    }
  }

  .dropdownToggle {
    clear: both;
    white-space: nowrap;
    text-align: right;
    font-size: 14px;
    margin-top: $scale-4-1;

    @include breakpoint('tablet') { margin-top: $scale-3-1; }

    &:after {
      content: ' \0002C5';
      display: inline-block;
      margin-left: 6px;
      font-size: 20px;
      line-height: 0.8;
      transform: translateY(8px) scaleX(1.2);
    }
  }

  .dropdown {
    &-axis {
      z-index: $zindex-dropdownAxis !important;
    }
  }

  .subheader {
    position: absolute;
    background-color: $color-blue;
    z-index: $zindex-subheader;
    width: 100%;
    height: 93px;
    left: 0;
    top: 56px;
    transform: translate3d(0, -160px, 0);
    animation: slideDownSubheader .6s .3s forwards;

    &-dot,
    &-axis {
      display: flex;
      align-items: center;
    }

    &-dot { justify-content: center; }
    &-axis {
      justify-content: space-between;
      padding: 9px 0;

      &_title {
        color: white;
        font-size: 24px;

        @include breakpoint( 'custom', '540px' ) {
          line-height: 1.4;
          font-size: 14px;
        }
      }
    }

    a {
      font-size: $fontSize-small;
      display: block;
      max-width: 160px;
      display: inline-block;
      &:first-child { text-align: right; }
      @include breakpoint('mobile') { font-size: $fontSize-xsmall; }
    }

    .matrixlocation { position: relative; margin: 0 $scale-2-1; top: 2px; }
  }
</style>
