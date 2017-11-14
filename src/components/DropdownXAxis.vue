<template>
  <dropdown fullWidth class="dropdown-axis" :visible="visible">
    <div class="display-flex margin-bottom-4-1">
      <img src="../assets/icons/y-axis/kunstig-intelligens-big-data-og-robotter-darkyellow.png" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">Kunstig Intelligens, Big Data &amp; Robotter</h3>
        <p>Robotter kan være både fysiske eller helt digitale. Kunstig intelligens (AI) er ‘hjernen’ bag en robot. AI er algoritmer der bruger computerkraft og (big) data til at tænke eller opføre sig autonomt. AI kan se sammenhænge mennesket ikke kan se selv. De mest almindelige robotter i dag er Robot Proces Automation (RPA) som kan overtage standardiserede digitale processer som at fæytte data eller udfylde formularer etc. Disse robotter overtager allerede nogle af de opgaver mennesker tidligere udførte. I fremtiden kommer mere avancerede AI robotter også til at udføre komplekse opgaver som kræver vurdering.</p>
      </div>
    </div>
    <div class="display-flex margin-bottom-4-1">
      <img src="../assets/icons/y-axis/internet-of-things-darkyellow.png" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">Internet of Things</h3>
        <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
      </div>
    </div>
    <div class="display-flex margin-bottom-4-1">
      <img src="../assets/icons/y-axis/virtual-reality-og-augmented-reality-darkyellow.png" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">Virtual Reality &amp; Augmented Reality</h3>
        <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
      </div>
    </div>
    <div class="display-flex margin-bottom-4-1">
      <img src="../assets/icons/y-axis/deleokonomi-og-blockchain-darkyellow.png" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">Deleøkonomi &amp; Blockchain</h3>
        <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
      </div>
    </div>
    <div class="display-flex margin-bottom-4-1">
      <img src="../assets/icons/y-axis/data-privatliv-transparens-og-sikkerhed-darkyellow.png" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">Data, Privatliv, Transparens &amp; Sikkerhed</h3>
        <p>Internet of Things er en betegnelse for alle de ting der i dag er forbundet til internettet. Det kan være alt fra simple sensorer der måler lys i et lokale, luftforurening, hjerteslag i en person til de 1,6 mia. nye smartphones der hvert år kobles på nettet.</p>
      </div>
    </div>
  </dropdown>
</template>

<script>
  import Dropdown from '@/components/Dropdown'
  export default {
    name: 'DropdownMatrix',
    components: { 'dropdown': Dropdown },
    props: { visible: Boolean }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/zindexes';
  .dropdown {
    &-axis {
      padding-top: $scale-6-1 !important;
      z-index: $zindex-dropdownAxis !important;
      &:after {
        top: $scale-3-1 !important;
      }
    }
  }
</style>
