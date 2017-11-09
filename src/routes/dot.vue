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
        <div class="span-12">
          <span class="watermarkWord">Konkret</span>
          <h1 class="margin-bottom-4-1">Hvad er det?</h1>
          <ul class="whatList">
            <li>Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder. </li>
            <li>Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.</li>
            <li>Man kan fremad se, at de har været udset til at læse, at der skal dannes par af ligheder. </li>
            <li>Dermed kan der afsluttes uden løse ender, og de kan optimeres fra oven af at formidles stort uden brug fra presse.</li>
          </ul>
        </div>
      </grid-block>
    </div>
  </div>
</template>

<script>
  import GridBlock from '@/components/GridBlock'
  export default {
    name: 'DotRoute',
    components: { 'grid-block': GridBlock }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  .whatList {
    list-style: none;
    list-style-position: inside;

    & li {
      margin-bottom: $scale-2-1;
      position: relative;
      font-size: $fontSize-large;
      font-family: $fontFamily-serif;

      &:before {
        content: '';
        position: absolute;
        left: -32px;
        top: 9px;
        width: 8px;
        height: 8px;
        background-size: contain;
        background-image: url( '../assets/images/list-dot.svg' );
      }
    }

  }
</style>
