<template>
  <div v-if="crosspoint" class="dotRoute backgroundColor-light">

    <grid-block v-if="crosspoint.acf.intro_text">
      <div class="span-6 margin-bottom-6-1">
        <h1 :style="{ fontSize: '100px', lineHeight: 0.9 }">{{ crosspoint.acf.intro_title }}</h1>
        <p :style="{ marginTop: '32px' }" v-html="crosspoint.acf.intro_text" />
      </div>
      <div class="span-4 offset-2">
        <img v-if="crosspoint.acf.intro_image" :src="crosspoint.acf.intro_image" width="100%" alt="Maturity/potential">
      </div>
    </grid-block>

    <div class="backgroundColor-white fadeIn" v-if="crosspoint.acf.what_is_it">
      <grid-block>
        <div class="span-8">
          <headline watermark="Konkret" headline="Hvad er det?" />
          <list largeText :items="crosspoint.acf.what_is_it" itemKey="point" />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white fadeIn" v-if="crosspoint.acf.pilots">
      <grid-block noPadding>
        <div class="span-12">
          <card
            :illustrationUrl="rocket"
            headline="Piloter i Danmark"
            :items="crosspoint.acf.pilots"
            itemKey="pilot"
            :linkUrl="`mailto:${crosspoint.acf.pilots_contact_mail}`"
            linkLabel="Skriv til os her"
            linkIntro="Gør I noget lignende i jeres kommune?"
            withSplitter />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white fadeIn" :style="{ marginTop: '-1px' }" v-if="crosspoint.acf.perspectives || crosspoint.acf.perspectives_text">
      <grid-block>
        <div class="span-8 offset-4">
          <h1>Perspektiver</h1>
        </div>
        <div class="span-3 hide-mobile">
          <app-image
            :url="crosspoint.acf.perspectives_image ? crosspoint.acf.perspectives_image : telescope"
            :height="crosspoint.acf.perspectives_image_height" />
        </div>
        <div class="span-8 offset-1">
          <accordion v-if="crosspoint.acf.perspectives" :items="crosspoint.acf.perspectives" />
          <p v-else class="margin-bottom-4-1">{{ crosspoint.acf.perspectives_text }}</p>
        </div>
      </grid-block>
    </div>

    <grid-block v-if="this.cases">
      <headline watermark="Cases" center white />
      <div class="span-6" v-for="(caseInstance, index) in cases" :key="index">
        <card
          :imageUrl="caseInstance.acf.image"
          backgroundColor="white"
          :headline="caseInstance.title.rendered"
          :text="caseInstance.acf.text"
          :linkUrl="caseInstance.acf.read_more_url"
          linkLabel="Læs mere her" />
      </div>
    </grid-block>

    <div class="backgroundColor-white fadeIn" :style="{ paddingBottom: '200px' }" v-if="crosspoint.acf.what_if">
      <grid-block>
        <headline center watermark="Hvad nu hvis?" headline="Oplæg til dialog og refleksion" />
        <div class="span-8 offset-2 margin-top-2-1">
          <list largeText ellipsis :items="crosspoint.acf.what_if" itemKey="point" />
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

  // Assets
  import Rocket from '@/assets/icons/icon-rocket.svg'
  import Telescope from '@/assets/images/telescope.png'

  // Utils
  import { fetchData } from '@/utils/fetchData'

  export default {
    name: 'DotRoute',
    props: { routeChange: Object },
    mixins: [fetchData],
    components: {
      'grid-block': GridBlock,
      'card': Card,
      'list': List,
      'headline': Headline,
      'accordion': Accordion,
      'app-image': Image
    },
    data() {
      return {
        crosspoint: null,
        cases: null,
        rocket: Rocket,
        telescope: Telescope,
      }
    },
    created() {
      this.$bus.$emit( 'loadingPage', true )
      this.fetchData( `crosspoints?slug=${ this.$route.params.id }` ).then( res => {
        this.$bus.$emit( 'loadingPage', false )
        this.crosspoint = res[0]
        this.$bus.$emit( 'crosspointMeta', {
          matrixLocation: this.crosspoint.acf.matrix_location,
          area: this.crosspoint.acf.area,
          technology: this.crosspoint.acf.technology
        })
        let cases = []
        this.fetchData( `cases?slug=${ this.crosspoint.acf.case_1 }` ).then( res => {
          cases.push(res[0])
          this.fetchData( `cases?slug=${ this.crosspoint.acf.case_2 }` ).then( res => {
            cases.push(res[0])
            this.cases = cases
          })
        })
      })
    }
  }
</script>

<style lang="scss" scoped></style>
