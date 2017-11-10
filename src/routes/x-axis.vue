<template>
  <div class="xAxisRoute backgroundColor-light">

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
            :illustrationUrl="rocket"
            headline="Piloter i Danmark"
            :items="pilotsItems"
            linkUrl="mailto:ida@daredisrupt.com"
            linkLabel="Skriv til os her"
            linkIntro="Gør I noget lignende i jeres kommune?"
            withSplitter />

        </div>
      </grid-block>
    </div>

    <div class="backgroundColor-white">
      <grid-block>

        <div class="span-8 offset-4">
          <h1>Perspektiver</h1>
        </div>

        <div class="span-3 perspectives_imageWrap">
          <app-image :url="testImage" height="300" />
        </div>

        <div class="span-8 offset-1">
          <accordion :items="perspectivesItems" />
        </div>

      </grid-block>
    </div>

    <grid-block>

      <h1>Betydning for danske kommuner</h1>

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

    <div class="backgroundColor-white">
      <grid-block>

        <headline center watermark="Hvad nu hvis?" headline="Oplæg til dialog og refleksion" />

        <div class="span-8 offset-2">
          <list largeText ellipsis :items="discussionItems" />
        </div>

      </grid-block>
    </div>

  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  import Card from '@/components/Card'
  import List from '@/components/List'
  import Headline from '@/components/Headline'
  import Accordion from '@/components/Accordion'
  import Image from '@/components/Image'
  import Rocket from '@/assets/icons/icon-rocket.svg'
  import TestImage from '@/assets/images/telescope.png'
  import TestImage2 from '@/assets/images/arbejdsmarked-og-erhverv.png'
  export default {
    name: 'xAxisRoute',
    props: { routeChange: Object },
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
        rocket: Rocket,
        testImage: TestImage,
        testImage2: TestImage2,
        discussionItems: [
          'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.',
          'Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.'
        ],
        pilotsItems: [
          'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.',
          'Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.'
        ],
        perspectivesItems: [
          { title: 'Test', text: 'Text...' },
          { title: 'Test 2', text: 'Text 2...' },
          { title: 'Test 3', text: 'Text 3...' },
        ],
        cases: [{}, {}]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  .perspectives {
    &_imageWrap {
      @include breakpoint( 'mobile' ) {
        display: none;
      }
    }
  }
</style>
