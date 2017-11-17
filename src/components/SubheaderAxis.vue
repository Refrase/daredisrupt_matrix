<template>

    <grid-block v-if="pageTitleAndIcon" noPadding class="height-full">
      <div class="span-12 margin-none height-full display-flex">
        <div class="subheaderAxis">
          <div :style="{ height: '60px', position: 'relative' }">
            <div v-if="pageTitleAndIcon.icon" class="height-full display-inlineBlock fadeIn">
              <img :src="pageTitleAndIcon.icon" height="100%" class="display-block position-relative" :style="{ bottom: '3px', margin: '0 auto' }">
            </div>
            <h1 v-if="pageTitleAndIcon.title" class="subheaderAxis_title fadeIn" v-html="pageTitleAndIcon.title" />
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
        dropdownVisible: false,
        pageTitleAndIcon: null
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
    },
    created() {
      this.$bus.$on( 'pageTitleAndIcon', (pageTitleAndIcon) => { this.pageTitleAndIcon = pageTitleAndIcon })
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
      bottom: 24px;
      position: relative;
      margin-left: $scale-2-1;
      white-space: wrap !important;
      font-size: 24px;

      @include breakpoint( 'mobile' ) {
        line-height: 1.4;
        bottom: 26px;
        font-size: 20px;
      }

      @include breakpoint( 'custom', '620px' ) {
        line-height: 1.4;
        bottom: 28px;
        font-size: 14px;
      }
      @include breakpoint( 'custom', '420px' ) {
        bottom: 26px;
        max-width: 60%;
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
