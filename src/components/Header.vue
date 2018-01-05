<template>
  <div>

    <div class="header" :class="{ 'header-matrix': isMatrix, 'header-notMatrix': !isMatrix }">

      <grid-block noPadding v-if="!isMatrix">
        <div class="inner span-12 display-flex justifyContent-spaceBetween alignItems-center margin-none">
          <header-inner />
        </div>
      </grid-block>

      <header-inner v-on:dropdownToggled="dropdownVisible = !dropdownVisible" v-else />

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
  import HeaderInner from '@/components/HeaderInner'
  import Subheader from '@/components/Subheader'
  import SubheaderDot from '@/components/SubheaderDot'
  import SubheaderAxis from '@/components/SubheaderAxis'
  import DropdownToggle from '@/components/DropdownToggle'
  import DropdownMatrix from '@/components/DropdownMatrix'
  export default {
    name: 'Header',
    components: {
      'grid-block': GridBlock,
      'header-inner': HeaderInner,
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

    &-matrix {
      height: 99px;
      padding: $scale-4-1;
      background-color: $color-darkblue-darker-4;
      border: 1px solid $color-darkblue-darker-3;
      @include breakpoint('custom', '1200px') { padding: $scale-4-1 $scale-2-1; }
    }

    &-notMatrix {
      height: 56px;
      padding: $scale-2-1 0;
      background-color: $color-darkblue;
      border: none !important;
      @include breakpoint('tablet') { padding: $scale-2-1; }
    }
  }

  .inner { @include breakpoint( 'mobile' ) { padding: 0; } }
</style>
