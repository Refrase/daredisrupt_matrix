<template>
  <div v-if="technology" class="yAxisRoute backgroundColor-light">

    <grid-block v-if="technology.acf.intro_text">
      <div class="span-6 margin-bottom-6-1">
        <h1 :style="{ fontSize: '100px', lineHeight: 0.9 }">{{ technology.acf.intro_title }}</h1>
        <p :style="{ marginTop: '32px' }" v-html="technology.acf.intro_text" />
      </div>
      <div class="span-4 offset-2" v-if="technology.acf.intro_image">
        <app-image
          :url="technology.acf.intro_image"
          :height="technology.acf.intro_image_height" />
      </div>
    </grid-block>

    <div class="fadeIn" v-if="technology.acf.drivers">
      <grid-block>
        <div class="span-12 margin-top-6-1">
          <card
            :illustrationUrl="graphArrow"
            headline="Drivere"
            :items="technology.acf.drivers"
            itemKey="driver"
            htmlContent
            withSplitter />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white fadeIn"
      v-if="technology.acf.perspectives_text || technology.acf.new_possibilities">
      <grid-block>
        <div class="span-3 hide-mobile">
          <app-image
            :url="technology.acf.perspectives_image ? technology.acf.perspectives_image : telescope"
            :height="technology.acf.perspectives_image_height" />
        </div>
        <div class="span-8 offset-1">
          <h1 class="margin-bottom-2-1">Perspektiver</h1>
          <p class="margin-bottom-4-1" v-html="technology.acf.perspectives_text" />
          <accordion :items="technology.acf.new_possibilities" />
        </div>
      </grid-block>
    </div>

    <grid-block v-if="technology.acf.meaning_table_rows && !isDataPrivatlivTransparensOgSikkerhedRoute">
      <div class="span-12">
        <headline headline="Betydning for </br>danske kommuner" center yellow />
        <table-meaning :rows="technology.acf.meaning_table_rows" />
      </div>
    </grid-block>

    <grid-block v-if="technology.acf.important_questions && isDataPrivatlivTransparensOgSikkerhedRoute">
      <headline center white watermark="Vigtige" headline="Spørgsmål" />
      <div class="span-8 offset-2 margin-top-2-1">
        <list largeText ellipsis :items="technology.acf.important_questions" itemKey="point" />
      </div>
    </grid-block>

    <div class="backgroundColor-white fadeIn" v-if="cases && cases.length">
      <grid-block>
        <headline watermark="Cases" center />
        <div class="span-6" v-bind:class="{ 'offset-3': cases && cases.length === 1 }" v-for="(caseInstance, index) in cases" :key="index">
          <card
            :imageUrl="caseInstance.acf.image ? caseInstance.acf.image : null"
            backgroundColor="light"
            :headline="caseInstance.title.rendered"
            :text="caseInstance.acf.text"
            :linkUrl="caseInstance.acf.read_more_url"
            linkLabel="Læs mere her" />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white fadeIn" :style="{ paddingBottom: '120px', marginTop: '-1px' }" v-if="technology.acf.short_term && technology.acf.long_term">
      <grid-block :noPadding="cases && cases.length ? true : null">
        <headline center headline="Forventet udvikling" />
        <headline center yellow headline="Kort sigt" watermark="Ca. 3 år" />
        <div class="span-8 offset-2">
          <p v-html="technology.acf.short_term" />
        </div>
        <headline center yellow headline="Lang sigt" watermark="+ 3 år" />
        <div class="span-8 offset-2">
          <p v-html="technology.acf.long_term" />
        </div>
      </grid-block>
    </div>

  </div>
</template>

<script>
  // Components
  import GridBlock from '@/components/GridBlock'
  import Card from '@/components/Card'
  import Headline from '@/components/Headline'
  import Accordion from '@/components/Accordion'
  import Image from '@/components/Image'
  import TableMeaning from '@/components/TableMeaning'
  import List from '@/components/List'

  // Assets
  import GraphArrow from '@/assets/images/icon-graph-arrow.svg'
  import Telescope from '@/assets/images/telescope.png'

  // Utils
  import { fetchData } from '@/utils/fetchData'

  export default {
    name: 'yAxisRoute',
    props: { routeChange: Object },
    mixins: [fetchData],
    components: {
      'grid-block': GridBlock,
      'card': Card,
      'headline': Headline,
      'accordion': Accordion,
      'app-image': Image,
      'table-meaning': TableMeaning,
      'list': List
    },
    data() {
      return {
        technology: null,
        cases: null,
        graphArrow: GraphArrow,
        telescope: Telescope
      }
    },
    computed: {
      isDataPrivatlivTransparensOgSikkerhedRoute() { return this.$route.params.id === 'data-privatliv-transparens-og-sikkerhed' }
    },
    created() {
      this.$bus.$emit( 'loadingPage', true )
      this.fetchData( `technologies?_embed&slug=${ this.$route.params.id }` ).then( res => {
        this.$bus.$emit( 'loadingPage', false )
        this.technology = res[0]
        this.$bus.$emit( 'pageTitleAndIcon', {
          title: this.technology.title.rendered,
          icon: this.technology._embedded['wp:featuredmedia'][0].source_url
        })
        let cases = []
        this.fetchData( `cases?slug=${ this.technology.acf.case_1 }` ).then( res => {
          res.length ? cases.push(res[0]) : null
          this.fetchData( `cases?slug=${ this.technology.acf.case_2 }` ).then( res => {
            res.length ? cases.push(res[0]) : null
            this.cases = cases
          })
        })
      })
    }
  }
</script>

<style lang="scss" scoped></style>
