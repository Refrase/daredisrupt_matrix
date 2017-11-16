<template>
  <div v-if="area" class="xAxisRoute backgroundColor-light">

    <grid-block v-if="area.acf.intro_text">
      <div class="span-6">
        <h1 :style="{ fontSize: '100px' }" class="margin-bottom-2-1">{{ area.acf.intro_title }}</h1>
        <p>{{ area.acf.intro_text }}</p>
      </div>
      <div class="span-4 offset-2" v-if="area.acf.intro_image">
        <app-image
          :url="area.acf.intro_image"
          :height="area.acf.intro_image_height" />
      </div>
    </grid-block>

    <div class="backgroundColor-white" v-if="area.acf.pilots">
      <grid-block>
        <div class="span-12">
          <card
            :illustrationUrl="rocket"
            headline="Piloter i Danmark"
            :items="area.acf.pilots"
            itemKey="pilot"
            :linkUrl="`mailto:${area.acf.pilots_contact_mail}`"
            linkLabel="Skriv til os her"
            linkIntro="Gør I noget lignende i jeres kommune?"
            withSplitter />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white" :style="{ marginTop: '-8%' }" v-if="area.acf.perspectives">
      <grid-block>
        <div class="span-8 offset-4">
          <h1>Perspektiver</h1>
        </div>
        <div class="span-3 hide-mobile">
          <app-image
            :url="area.acf.perspectives_image ? area.acf.perspectives_image : telescope"
            :height="area.acf.perspectives_image_height" />
        </div>
        <div class="span-8 offset-1">
          <accordion :items="area.acf.perspectives" />
        </div>
      </grid-block>
    </div>

    <grid-block noPadding v-if="area.acf.meaning_table_rows">
      <div class="span-12" :style="{ marginBottom: '80px' }">
        <headline headline="Betydning for </br>danske kommuner" center yellow :style="{ marginTop: '-2.5%' }" />
        <table-meaning :rows="area.acf.meaning_table_rows" />
      </div>
    </grid-block>

    <div class="backgroundColor-white" v-if="this.cases">
      <grid-block>
        <headline watermark="Cases" center />
        <div class="span-6" v-for="(caseInstance, index) in cases" :key="index">
          <card
            :imageUrl="caseInstance.acf.image"
            backgroundColor="light"
            :headline="caseInstance.title.rendered"
            :text="caseInstance.acf.text"
            :linkUrl="caseInstance.acf.read_more_url"
            linkLabel="Læs mere her" />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white" :style="{ marginBottom: '200px' }" v-if="area.acf.what_if">
      <grid-block>
        <headline center watermark="Hvad nu hvis?" headline="Oplæg til dialog og refleksion" />
        <div class="span-8 offset-2">
          <list largeText ellipsis :items="area.acf.what_if" itemKey="point" />
        </div>
      </grid-block>
    </div>

  </div>
</template>

<script>
  // Components
  import GridBlock from '@/components/GridBlock'
  import Card from '@/components/Card'
  import List from '@/components/List'
  import Headline from '@/components/Headline'
  import Accordion from '@/components/Accordion'
  import Image from '@/components/Image'
  import TableMeaning from '@/components/TableMeaning'

  // Assets
  import Rocket from '@/assets/icons/icon-rocket.svg'
  import Telescope from '@/assets/images/telescope.png'

  // Utils
  import { fetchData } from '@/utils/fetchData'

  export default {
    name: 'xAxisRoute',
    props: { routeChange: Object },
    mixins: [fetchData],
    components: {
      'grid-block': GridBlock,
      'card': Card,
      'list': List,
      'headline': Headline,
      'accordion': Accordion,
      'app-image': Image,
      'table-meaning': TableMeaning
    },
    data() {
      return {
        area: null,
        cases: null,
        rocket: Rocket,
        telescope: Telescope
      }
    },
    created() {
      this.$bus.$emit( 'loadingPage', true )
      this.fetchData( `areas?slug=${ this.$route.params.id }` ).then( res => {
        this.$bus.$emit( 'loadingPage', false )
        this.area = res[0]
        let cases = []
        this.fetchData( `cases?slug=${ this.area.acf.case_1 }` ).then( res => {
          cases.push(res[0])
          this.fetchData( `cases?slug=${ this.area.acf.case_2 }` ).then( res => {
            cases.push(res[0])
            this.cases = cases
          })
        })
      })
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/helpers';

  .table-meanings {
    width: 100%;
    border-collapse: collapse;
    background-color: $color-light;
    th, td {
      border: 12px solid $color-light;
      padding: $scale-2-1 $scale;
      min-height: 250px;
    }
    th {
      font-family: $fontFamily-serif;

      line-height: 1.2;
    }
    td {
      font-family: $fontFamily-sans;
      font-size: $fontSize-base;
      line-height: 1.3;
      padding: $scale-3-1 $scale-4-1;
      position: relative;
      height: 250px;
      span {
        position: relative;
        z-index: 1;
      }
      &:before {
        content: '';
        position: absolute;
        background-color: white;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        border-radius: 3px;
      }
    }
    th[scope="col"] { padding-bottom: 0; }
    th[scope="row"] {
      position: relative;
      border: 0;
      padding: 0;
      span {
        @extend .rotateToVertical;
        white-space: nowrap;
      }
    }
    .impact {
      font-family: $fontFamily-serif;
      font-weight: 600;
      font-size: $fontSize-xxlarge;
      text-transform: uppercase;
      position: relative;
      &.high   { color: $color-green; }
      &.medium { color: $color-darkblue; }
      &.low    { color: $color-yellow; }
      span {
        @extend .rotateToVertical;
        @include breakpoint( 'mobile' ) {
          top: 0;
          width: 200px;
          text-align: right;
          transform: translateX(-50%) translateY(116px) rotate(-90deg);
        }
      }
    }
  }
</style>
