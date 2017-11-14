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

    <div class="backgroundColor-white" :style="{ marginTop: '-8%' }">
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

    <grid-block noPadding>
      <div class="span-12">

        <table class="table-meanings">
          <thead>
            <tr>
              <th></th>
              <th scope="col" class="hide-mobile">Hvor ses det?</th>
              <th scope="col">Perspektiver og muligheder</th>
              <th scope="col" class="hide-mobileSmall">Impact</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><span>AI, Big Data og Robotter</span></th>
              <td class="hide-mobile"><span>Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå.Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå.Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå.Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå.</span></td>
              <td><span>Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder. Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse. I en kant af landet går der blandt om, at de vil sætte den over forbehold for tiden. Vi flotter med et hold, der vil rundt og se sig om i byen. Det gør heller ikke mere. Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå. Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå. Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå. Virksomheder vil benytte AI og robotter til at effektivisere og opnå konkurrenceevne via. I de næste ca. 13 år vil omkring 40% af de jobs vi kender i dag forsvinde og ca. 20% nye vil opstå.</span></td>
              <td class="impact hide-mobileSmall high"><span>Høj</span></td>
            </tr>
            <tr>
              <th scope="row"><span>Internet of Things</span></th>
              <td class="hide-mobile"></td>
              <td></td>
              <td class="impact hide-mobileSmall low"><span>Lav</span></td>
            </tr>
            <tr>
              <th scope="row"><span>VR &amp; AR</span></th>
              <td class="hide-mobile"></td>
              <td></td>
              <td class="impact hide-mobileSmall medium"><span>Mellem</span></td>
            </tr>
            <tr>
              <th scope="row"><span>Deleøkonomi &amp; Blockchain</span></th>
              <td class="hide-mobile"></td>
              <td></td>
              <td class="impact hide-mobileSmall high"><span>Høj</span></td>
            </tr>
            <tr>
              <th scope="row"><span>Data, Privatliv, Transparens</span></th>
              <td class="hide-mobile"></td>
              <td></td>
              <td class="impact hide-mobileSmall high"><span>Høj</span></td>
            </tr>
          </tbody>
        </table>

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
  @import '~@/styles/helpers';
  .perspectives {
    &_imageWrap {
      @include breakpoint( 'mobile' ) {
        display: none;
      }
    }
  }

  .table-meanings {
    margin-bottom: $scale-10-1;
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
