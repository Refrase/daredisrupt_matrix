<template>
  <div class="dotRoute backgroundColor-light">

    <grid-block>

      <div class="span-6">
        <h1 :style="{ fontSize: '100px' }" class="margin-bottom-2-1">Intro</h1>
        <p>Selv om hun har sat alt mere frem, og derfor ikke længere kan betragtes som den glade giver, er det en nem sammenstilling, som bærer ved i lang tid. Det går der så nogle timer ud, hvor det er indlysende, at virkeligheden bliver tydelig istandsættelse. Det er opmuntrende og anderledes, at det er dampet af kurset i morgen. Der indgives hvert år enorme strenge af blade af større eller mindre tilsnit. I denne afdeling finder man blandt andet som en om håndtering af samme grund. Politik handler som bekendt ligeså meget om at tale, som at stå frem for tiden.</p>
      </div>
      <div class="span-4 offset-2">
        <img src="../assets/images/matrix-maturity-potential/matrix-maturity-potential-04.png" width="100%" alt="Maturity/potential">
      </div>

    </grid-block>

    <div class="backgroundColor-white">
      <grid-block>
        <div class="span-8">

          <headline watermark="Konkret" headline="Hvad er det?" />
          <list largeText :items="whatListItems" />

        </div>
      </grid-block>
    </div>

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

  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  import Card from '@/components/Card'
  import List from '@/components/List'
  import Headline from '@/components/Headline'
  import Rocket from '@/assets/icons/icon-rocket.svg'
  import TestImage from '@/assets/images/matrix-maturity-potential/matrix-maturity-potential-04.png'
  export default {
    name: 'DotRoute',
    components: {
      'grid-block': GridBlock,
      'card': Card,
      'list': List,
      'headline': Headline,
    },
    data() {
      return {
        rocket: Rocket,
        testImage: TestImage,
        whatListItems: [
          'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.',
          'Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.'
        ],
        pilotsItems: [
          'Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder.',
          'Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.'
        ]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
</style>
