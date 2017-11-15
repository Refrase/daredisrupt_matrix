<template>

    <grid-block noPadding class="height-full">
      <div class="span-12 margin-none height-full display-flex">
        <div class="subheaderAxis">
          <div :style="{ height: '40px', position: 'relative', whiteSpace: 'nowrap' }">
            <div class="height-full display-inlineBlock">
              <img src="../assets/icons/x-axis/icon-arbejdsmarked-og-erhverv.png" height="100%" class="display-block" :style="{ margin: '0 auto' }">
            </div>
            <h1 class="subheaderAxis_title">Arbejdsmarked og erhverv</h1>
          </div>
          <dropdown-toggle v-if="isXAxis" @click.native="dropdownVisible = !dropdownVisible" label="De 5 teknologiske temaer" class="margin-none" />
        </div>
      </div>
      <dropdown-x-axis v-if="isXAxis" @click.native="dropdownVisible = !dropdownVisible" :visible="dropdownVisible" />
    </grid-block>

</template>

<script>
  import GridBlock from '@/components/GridBlock'
  import DropdownToggle from '@/components/DropdownToggle'
  import DropdownXAxis from '@/components/DropdownXAxis'
  export default {
    name: 'SubheaderAxis',
    components: {
      'grid-block': GridBlock,
      'dropdown-toggle': DropdownToggle,
      'dropdown-x-axis': DropdownXAxis
    },
    data() {
      return {
        dropdownVisible: false
      }
    },
    computed: {
      isXAxis() { return this.$route.name === 'x-axis' }
    },
    watch: {
      dropdownVisible: function () { this.dropdownToggled(this.dropdownVisible) },
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

  .subheaderAxis {
    display: flex;
    align-items: center;
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
</style>
