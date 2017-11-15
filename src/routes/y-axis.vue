<template>
  <div class="yAxisRoute backgroundColor-light">

    <grid-block>
      <div class="span-6">
        <h1 :style="{ fontSize: '100px' }" class="margin-bottom-2-1">Intro</h1>
        <p>Selv om hun har sat alt mere frem, og derfor ikke længere kan betragtes som den glade giver, er det en nem sammenstilling, som bærer ved i lang tid. Det går der så nogle timer ud, hvor det er indlysende, at virkeligheden bliver tydelig istandsættelse. Det er opmuntrende og anderledes, at det er dampet af kurset i morgen. Der indgives hvert år enorme strenge af blade af større eller mindre tilsnit. I denne afdeling finder man blandt andet som en om håndtering af samme grund. Politik handler som bekendt ligeså meget om at tale, som at stå frem for tiden.</p>
      </div>
      <div class="span-4 offset-2">
        <app-image :url="testImage2" height="300" />
      </div>
    </grid-block>

    <div class="backgroundColor-white">
      <grid-block>
        <div class="span-12">
          <card
            :illustrationUrl="graphArrow"
            headline="Drivere"
            :items="driversItems"
            withSplitter />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white" :style="{ marginTop: '-8%' }">
      <grid-block>
        <div class="span-3 hide-mobile">
          <app-image :url="testImage" height="300" />
        </div>
        <div class="span-8 offset-1">
          <h1 class="margin-bottom-2-1">Perspektiver</h1>
          <p class="margin-bottom-4-1">Perspektic y-akse tekst</p>
          <accordion :items="possibilitiesItems" />
        </div>
      </grid-block>
    </div>

    <grid-block noPadding>
      <div class="span-12" :style="{ marginBottom: '80px' }">
        <headline headline="Betydning for </br>danske kommuner" center yellow :style="{ marginTop: '-2.5%' }" />
        <table-meaning :rows="tableMeaningRows" />
      </div>
    </grid-block>

    <div class="backgroundColor-white">
      <grid-block>
        <headline watermark="Cases" center />
        <div class="span-6" v-for="(caseInstance, index) in cases" :key="index">
          <card
            :imageUrl="testImage"
            backgroundColor="light"
            headline="Test"
            text="Texttest"
            linkUrl="test"
            linkLabel="Test" />
        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white" :style="{ marginBottom: '120px' }">
      <grid-block noPadding>
        <headline center headline="Forventet udvikling" />
        <headline center yellow headline="Kort sigt" watermark="Ca. 3 år" />
        <div class="span-8 offset-2">
          <p>Kortsigtet...</p>
        </div>
        <headline center yellow headline="Lang sigt" watermark="+ 3 år" />
        <div class="span-8 offset-2">
          <p>Langsigtet...</p>
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

  // Assets
  import GraphArrow from '@/assets/icons/icon-graph-arrow.svg'
  import TestImage from '@/assets/images/telescope.png'
  import TestImage2 from '@/assets/images/arbejdsmarked-og-erhverv.png'

  export default {
    name: 'yAxisRoute',
    props: { routeChange: Object },
    components: {
      'grid-block': GridBlock,
      'card': Card,
      'headline': Headline,
      'accordion': Accordion,
      'app-image': Image,
      'table-meaning': TableMeaning
    },
    data() {
      return {
        graphArrow: GraphArrow,
        testImage: TestImage,
        testImage2: TestImage2,
        driversItems: [
          'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.',
          'Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.'
        ],
        possibilitiesItems: [ { title: 'Nye muligheder', text: 'Text...' } ],
        tableMeaningRows: [
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Høj' },
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Mellem' },
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Lav' },
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Mellem' },
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Høj' },
          { title: 'Børn og læring', whereIsItSeen: 'Text...', perspectivesAndPossibilities: 'Text...', impact: 'Høj' }
        ],
        cases: [{}, {}]
      }
    }
  }
</script>

<style lang="scss" scoped></style>
