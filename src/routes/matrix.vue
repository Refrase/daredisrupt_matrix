<template>
  <div class="matrixRoute">
    <table class="matrix fadeInWithDelay" cellspacing="0" cellpadding="0">
      <thead>
        <tr title="Kommunale områder">
          <th class="corner"><div/></th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'boern-og-laering' } }">
              <img src="../assets/images/icon-born-og-laering.png" alt="" class="icon">Børn &amp; Læring
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'arbejdsmarked-og-erhverv' } }">
              <img src="../assets/images/icon-arbejdsmarked-og-erhverv.png" alt="" class="icon">Arbejdsmarked &amp; Erhverv
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'social-og-sundhed' } }">
              <img src="../assets/images/icon-social-og-sundhed.png" alt="" class="icon">Social &amp; Sundhed
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'miljoe-teknik-og-forsyning' } }">
              <img src="../assets/images/icon-miljo-teknik-og-forsyning.png" alt="" class="icon">Miljø, Teknik &amp; Forsyning
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'demokrati-og-involvering' } }">
              <img src="../assets/images/icon-demokrati-og-involvering.png" alt="" class="icon">Demokrati &amp; Involvering
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'administration-og-organisation' } }">
              <img src="../assets/images/icon-administration-og-organisation.png" alt="" class="icon">Administration &amp; Organisation
            </router-link>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'kunstig-intelligens-big-data-og-robotter' } }">
              <img src="../assets/images/icon-kunstig-intelligens-big-data-og-robotter.png" alt="" class="icon"><span>Kunstig Intelligens, Big Data &amp; Robotter</span>
            </router-link>
          </th>
          <td v-for="(slug, index) in slugsXAxis">
            <dot :linkParam="`kunstig-intelligens-big-data-og-robotter-${slug}`" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'internet-of-things' } }">
              <img src="../assets/images/icon-internet-of-things.png" alt="" class="icon">
              <span>Internet of Things</span>
            </router-link>
          </th>
          <td v-for="(slug, index) in slugsXAxis">
            <dot :linkParam="`internet-of-things-${slug}`" />
          </td>
        </tr>
        <tr>
          <th scope="row" title="Teknologiske temaer">
            <router-link :to="{ name: 'y-axis', params: { id: 'virtual-reality-og-augmented-reality' } }">
              <img src="../assets/images/icon-virtual-reality-og-augmented-reality.png" alt="" class="icon">
              <span>Virtual Reality &amp; Augmented Reality</span>
            </router-link>
          </th>
          <td v-for="(slug, index) in slugsXAxis">
            <dot :linkParam="`virtual-reality-og-augmented-reality-${slug}`" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'deleoekonomi-og-blockchain' } }">
              <img src="../assets/images/icon-deleokonomi-og-blockchain.png" alt="" class="icon">
              <span>Deleøkonomi &amp; Blockchain</span>
            </router-link>
          </th>
          <td v-for="(slug, index) in slugsXAxis">
            <dot :linkParam="`deleoekonomi-og-blockchain-${slug}`" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'data-privatliv-transparens-og-sikkerhed' } }">
              <img src="../assets/images/icon-data-privatliv-transparens-og-sikkerhed.png" alt="" class="icon">
              <span>Data, Privatliv, Transparens &amp; Sikkerhed</span>
            </router-link>
          </th>
          <td v-for="(slug, index) in slugsXAxis">
            <dot :linkParam="`data-privatliv-transparens-og-sikkerhed-${slug}`" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import Dot from '@/components/Dot'
  export default {
    name: 'MatrixRoute',
    components: { dot: Dot },
    data() {
      return {
        slugsXAxis: [ 'boern-og-laering', 'arbejdsmarked-og-erhverv', 'social-og-sundhed', 'miljoe-teknik-og-forsyning', 'demokrati-og-involvering', 'administration-og-organisation' ]
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/animations';
  @import '~@/styles/zindexes';

  $headerHeight: 99px;

  .matrixRoute {
    background-color: $color-blue;
    overflow-y: hidden;
    padding-top: 0;
  }

  .matrix {
    width: 100%;
    height: 100vh;
    text-align: center;
    font-family: $fontFamily-serif;
    color: white;
    white-space: pre-line;
    background-color: $color-blue;

    .label {
      font-family: $fontFamily-sans;
      padding: 4px 6px;
      line-height: 1;
      font-size: $fontSize-xsmall;
      font-weight: bold;
      background-color: $color-yellow;
      color: $color-yellow-darker-4;
      z-index: $zindex-label;
      position: absolute;
      text-transform: uppercase;
      white-space: nowrap;
      border-bottom-left-radius: $borderRadius;
      border-bottom-right-radius: $borderRadius;
    }

    thead tr:after {
      content: attr(title); // The title="" on the <tr>
      @extend .label;
      right: calc(50vw - 180px);
      top: 268px;
      @include breakpoint('custom', '1200px') { top: 262px; }
      @include breakpoint('mobile') {
        right: 0;
        top: 153px;
      }
    }

    tbody tr:nth-child(3) th:after {
      content: attr(title); // The title="" on the <tr>
      @extend .label;
      bottom: 50%;
      transform: translateX(-43%) rotate(270deg);
      left: calc(100vw - 978px);
      @include breakpoint('custom', '1200px') {
        left: calc(100vw - 965px);
        bottom: 100%;
      }
      @include breakpoint('custom', '1135px') {
        left: 172px;
      }
    }

    th, td {
      padding: $scale-3-1;
      line-height: 1.3;
    }

    th[scope="col"] {
      padding-top: $headerHeight + $scale-3-1;
      position: relative;
      border-bottom: 4px solid $color-yellow;

      a {
        color: white;
        text-decoration: underline;
        text-decoration-color: $color-yellow;
        font-size: $fontSize-large;
        &:hover { text-decoration: none; }
      }

      .icon {
        height: 60px;
        display: block;
        margin: 0 auto;
        margin-bottom: $scale-2-1;
      }
    }

    tr { width: 100%; }
    td {
      // width: calc( 100vw / 7 );
      width: 160px;
      min-width: 160px;
    }

    tbody tr:nth-child(odd),
    th:nth-child(even),
    td:nth-child(even), { background-color: rgba($color-darkblue, 0.3); }

    tbody tr:first-child th:before { // Corner of yellow line
      content: '';
      position: absolute;
      width: 4px;
      height: 4px;
      top: -4px;
      right: -4px;
      border-top-left-radius: $borderRadius;
      background-color: $color-yellow;
    }

    th[scope="row"], td { vertical-align: middle; }

    th[scope="row"] {
      position: relative;
      border-right: 4px solid $color-yellow;
      a {
        color: white;
        text-decoration: underline;
        text-decoration-color: $color-yellow;
        text-align: left;
        font-size: $fontSize-large;
        @include breakpoint('custom', '1250px') { font-size: $fontSize-base; }
        display: flex;
        align-items: center;
        height: 100%;
        &:hover { text-decoration: none; }
        span, .icon { display: inline-block; }
        span {
          width: calc(100% - 57px); // Icon height and therefore width (because it's squared)
          position: relative;
          margin-left: $scale-2-1;
          line-height: 1.3;
        }
        .icon {
          height: 57px;
          margin: 0;
        }
      }
    }

    td {
      a {
        position: relative;
        display: block;
      }
    }
  }
  @include breakpoint('custom', '1200px') {
    .matrix {
      .corner {
        display: block;
        width: calc(100% - 960px);
      }
      tr:nth-child(odd) th[scope="row"] { background-color: mix($color-darkblue, $color-blue, 30%); }
      th[scope="row"] {
        left: 0;
        position: fixed;
        height: 100%;
        z-index: $zindex-row;
        width: calc(100% - 960px);
        background-color: $color-blue;
        padding: $scale-2-1;
        a {
          position: fixed;
          max-width: 140px;
          .icon { display: none; }
          font-size: 14px;
          span {
            margin: 0;
            width: 100%;
            height: 100%
          }
        }
      }
      th[scope="col"] { margin-top: -8px; }
      th,
      th[scope="col"] a { font-size: 14px; }
    }
  }

  @include breakpoint('custom', '1135px') {
    .corner,
    th[scope="row"] { width: 176px !important; }
    table { height: calc(100vh - 10px) !important; } // To compensate for horisontal scrollbar, when the columns get to wide to fit in the window
  }

  @include breakpoint('mobile') {
    th, td { padding: $scale $scale-2-1 !important; }
    th[scope="col"] {
      padding-top: $headerHeight + $scale !important;
      vertical-align: middle;
    }
    .icon { display: none !important; }
    .corner,
    th[scope="row"] { width: 120px; }
  }

  // Postpone animation slightly for each dot from top left to bottom right
  @for $row from 1 through 5 {
  	@for $col from 2 through 7 { // Dot-cols start at col 2
      tr:nth-child(#{$row}) td:nth-child(#{$col}) a /deep/ .dot_shadow { animation-delay: #{($col - 1) * ($row / 30)}s !important; }
    }
  }

</style>
