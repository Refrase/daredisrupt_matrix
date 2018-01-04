<template>
  <div>

    <div class="header" :style="{ height: !isMatrix ? '56px' : '99px', padding: !isMatrix ? '16px 0' : null }">
      <grid-block noPadding>
        <div class="inner span-12 display-flex justifyContent-spaceBetween alignItems-center margin-none">

          <div v-if="isMatrix">
            <h1 class="headline">Kommunernes teknologiske fremtid<span class="hide-mobile"> &ndash; et værktøj til viden og dialog</span></h1>
            <p class="subheadline hide-mobile">KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid</p>
          </div>
          <div v-else>
            <router-link :to="{ name: 'matrix' }" class="display-flex alignItems-center">
              <img src="../assets/images/icon-spilleplade-on-button.svg" height="24" class="margin-right display-inlineBlock" />
              <span class="buttonBackLabel">Oversigt</span>
            </router-link>
          </div>

          <div>
            <div :style="{ minWidth: '160px' }">
              <a href="https://www.daredisrupt.com/" target="_blank" class="logo logo-daredisrupt hide-mobile">
                <img src="../assets/images/logo-daredisrupt-white.png" alt="Logo: DareDisrupt" height="19" />
              </a>
              <a href="http://kl.dk/" target="_blank" class="logo logo-kl" v-if="!isMatrix">
                <img src="../assets/images/logo-kl-white.svg" alt="Logo: KL" height="16" />
              </a>
              <social-links class="float-right margin-bottom" />
            </div>
            <dropdown-toggle v-if="isMatrix" @click.native="dropdownVisible = !dropdownVisible" label="Om kortlægningen" />
          </div>

        </div>
      </grid-block>
    </div>

    <subheader v-if="!isMatrix">
      <subheader-dot v-if="isDot" />
      <subheader-axis v-else />
    </subheader>

    <dropdown-matrix v-if="isMatrix" @click.native="dropdownVisible = !dropdownVisible" :visible="dropdownVisible" />

  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  import SocialLinks from '@/components/SocialLinks'
  import Subheader from '@/components/Subheader'
  import SubheaderDot from '@/components/SubheaderDot'
  import SubheaderAxis from '@/components/SubheaderAxis'
  import DropdownToggle from '@/components/DropdownToggle'
  import DropdownMatrix from '@/components/DropdownMatrix'
  export default {
    name: 'Header',
    components: {
      'grid-block': GridBlock,
      'social-links': SocialLinks,
      'subheader': Subheader,
      'subheader-dot': SubheaderDot,
      'subheader-axis': SubheaderAxis,
      'dropdown-toggle': DropdownToggle,
      'dropdown-matrix': DropdownMatrix
    },
    props: { routeChange: Object },
    data() {
      return {
        dropdownVisible: false
      }
    },
    computed: {
      isMatrix() { return this.$route.name === 'matrix' },
      isDot() { return this.$route.name === 'dot' }
    },
    watch: { dropdownVisible: function () { this.dropdownToggled(this.dropdownVisible) } },
    methods: {
      dropdownToggled(trigger) {
        this.$bus.$emit( 'dropdownToggled', { visible: trigger } )
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/zindexes';

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
    padding: $scale-3-1 0;
    @include breakpoint('tablet') { padding: $scale-2-1 0; }
  }

  .inner { @include breakpoint( 'mobile' ) { padding: 0; } }

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
    @include breakpoint('custom', '479px') { display: none; }
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
