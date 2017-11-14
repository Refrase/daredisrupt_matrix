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
      <grid-block v-if="!isDot" noPadding class="height-full">
        <div class="span-12 margin-none height-full display-flex">
          <div class="subheader-axis">
            <div :style="{ height: '40px', position: 'relative', whiteSpace: 'nowrap' }">
              <div class="height-full display-inlineBlock">
                <img src="../assets/icons/x-axis/icon-arbejdsmarked-og-erhverv.png" height="100%" class="display-block" :style="{ margin: '0 auto' }">
              </div>
              <h1 class="subheader-axis_title">Arbejdsmarked og erhverv</h1>
            </div>
            <p class="dropdownToggle a margin-none" @click="dropdownTechnologicalThemesVisible = !dropdownTechnologicalThemesVisible">De 5 teknologiske temaer</p>
          </div>
        </div>
      </grid-block>
    </div>

    <dropdown v-if="isMatrix"
      @click.native="dropdownVisible = !dropdownVisible"
      :visible="dropdownVisible">
      <h1 class="margin-bottom-2-1">Test</h1>
      <p>Indhold...</p>
    </dropdown>

    <dropdown fullWidth class="dropdown-axis" v-if="isXAxis"
      @click.native="dropdownTechnologicalThemesVisible = !dropdownTechnologicalThemesVisible"
      :visible="dropdownTechnologicalThemesVisible">
      <div class="display-flex margin-bottom-4-1">
        <img src="../assets/icons/y-axis/kunstig-intelligens-big-data-og-robotter-darkyellow.png" width="75px" height="75px" alt="Ikon for kunstig intelligens, big data og robotter">
        <div class="margin-left-3-1">
          <h3 class="margin-bottom margin-top">Kunstig Intelligens, Big Data &amp; Robotter</h3>
          <p>Robotter kan være både fysiske eller helt digitale. Kunstig intelligens (AI) er ‘hjernen’ bag en robot. AI er algoritmer der bruger computerkraft og (big) data til at tænke eller opføre sig autonomt. AI kan se sammenhænge mennesket ikke kan se selv. De mest almindelige robotter i dag er Robot Proces Automation (RPA) som kan overtage standardiserede digitale processer som at fæytte data eller udfylde formularer etc. Disse robotter overtager allerede nogle af de opgaver mennesker tidligere udførte. I fremtiden kommer mere avancerede AI robotter også til at udføre komplekse opgaver som kræver vurdering.</p>
        </div>
      </div>
      <div class="display-flex margin-bottom-4-1">
        <img src="../assets/icons/y-axis/internet-of-things-darkyellow.png" width="75px" height="75px" alt="Ikon for kunstig intelligens, big data og robotter">
        <div class="margin-left-3-1">
          <h3 class="margin-bottom margin-top">Internet of Things</h3>
          <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
        </div>
      </div>
      <div class="display-flex margin-bottom-4-1">
        <img src="../assets/icons/y-axis/virtual-reality-og-augmented-reality-darkyellow.png" width="75px" height="75px" alt="Ikon for kunstig intelligens, big data og robotter">
        <div class="margin-left-3-1">
          <h3 class="margin-bottom margin-top">Virtual Reality &amp; Augmented Reality</h3>
          <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
        </div>
      </div>
      <div class="display-flex margin-bottom-4-1">
        <img src="../assets/icons/y-axis/deleokonomi-og-blockchain-darkyellow.png" width="75px" height="75px" alt="Ikon for kunstig intelligens, big data og robotter">
        <div class="margin-left-3-1">
          <h3 class="margin-bottom margin-top">Deleøkonomi &amp; Blockchain</h3>
          <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
        </div>
      </div>
      <div class="display-flex margin-bottom-4-1">
        <img src="../assets/icons/y-axis/data-privatliv-transparens-og-sikkerhed-darkyellow.png" width="75px" height="75px" alt="Ikon for kunstig intelligens, big data og robotter">
        <div class="margin-left-3-1">
          <h3 class="margin-bottom margin-top">Data, Privatliv, Transparens &amp; Sikkerhed</h3>
          <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
        </div>
      </div>
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
    },
    watch: {
      dropdownVisible: function () { this.dropdownToggled(this.dropdownVisible) },
      dropdownTechnologicalThemesVisible: function () { this.dropdownToggled(this.dropdownTechnologicalThemesVisible) },
    },
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
    @include breakpoint('mobile') { font-size: 14px; }
    @include breakpoint('custom', '449px') { font-size: 12px; }
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
      padding-top: $headerHeightNotMatrix + $scale-4-1 !important;
      z-index: $zindex-dropdownAxis !important;
      &:after {
        top: $headerHeightNotMatrix + $scale-3-1 !important;
      }
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
      width: 100%;
      align-self: center;

      &_title {
        color: white;
        display: inline-block;
        bottom: 14px;
        position: relative;
        margin-left: $scale-2-1;
        white-space: wrap;
        font-size: 24px;

        @include breakpoint( 'mobile' ) {
          line-height: 1.4;
          font-size: 20px;
        }

        @include breakpoint( 'custom', '620px' ) {
          line-height: 1.4;
          bottom: 32px;
          font-size: 14px;
        }
      }

      .a {
        @include breakpoint( 'custom', '620px' ) {
          position: absolute;
          bottom: 2px;
          right: 0;
        }
      }
    }



    .matrixlocation { position: relative; margin: 0 $scale-2-1; top: 2px; }
  }
</style>
