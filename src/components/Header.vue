<template>
  <div>
    <div class="header">
      <div>
        <h1 class="headline">Kommunernes teknologiske fremtid - et værktøj til viden og dialog</h1>
        <p class="subheadline">KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid</p>
      </div>
      <div>
        <div>
          <img src="../assets/images/logo-daredisrupt-white.png" alt="Logo: Dare Disrupt" height="18" class="logo" />
          <div class="socialLinks">
            <a href="https://www.linkedin.com/company/kl"><img src="../assets/icons/icon-linkedin.svg" alt="LinkedIn" height="18" /></a>
            <a href="https://www.facebook.com/kommunerne/?rf=184003641627713"><img src="../assets/icons/icon-facebook.svg" alt="Facebook" height="18" /></a>
            <a href="https://twitter.com/kommunerne?lang=en"><img src="../assets/icons/icon-twitter.svg" alt="Twitter" height="18" /></a>
          </div>
        </div>
        <p class="dropdownToggle" @click="dropdownVisible = !dropdownVisible">Om kortlægningen</p>
      </div>
    </div>
    <dropdown
      @click.native="dropdownVisible = !dropdownVisible"
      :visible="dropdownVisible">
      <h1>Test</h1>
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
        dropdownVisible: false
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
    padding: $scale-3-1 $scale-4-1;
    color: white;
    background-color: $color-darkblue;
    min-height: 99px;
    display: flex;
    justify-content: space-between;
    z-index: $zindex-header;
    @include breakpoint('tablet') { padding: $scale-2-1 $scale-4-1; }
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

  .socialLinks {
    float: right;
    img { margin-left: $scale-1-2; }
  }

  .logo {
    display: block;
    float: right;
    margin-left: $scale-2-1;
    @include breakpoint('mobile') {
      height: 14px;
      margin-bottom: $scale;
    }
  }

  .dropdownToggle {
    clear: both;
    white-space: nowrap;
    cursor: pointer;
    font-family: $fontFamily-serif;
    vertical-align: baseline;
    color: $color-yellow;
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
</style>
