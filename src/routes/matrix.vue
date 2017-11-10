<template>
  <div class="matrixRoute">
    <table class="matrix" cellspacing="0" cellpadding="0">
      <thead>
        <tr title="Kommunale områder">
          <th class="corner"><div/></th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-born-og-laering.png" alt="" class="icon">Børn og læring</th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-arbejdsmarked-og-erhverv.png" alt="" class="icon">Arbejdsmarked og erhverv</th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-social-og-sundhed.png" alt="" class="icon">Social og sundhed</th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-miljo-teknik-og-forsyning.png" alt="" class="icon">Miljø, teknik og forsyning</th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-demokrati-og-involvering.png" alt="" class="icon">Demokrati og involvering</th>
          <th scope="col"><img src="../assets/icons/x-axis/icon-administration-og-organisation.png" alt="" class="icon">Administration og organisation</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><img src="../assets/icons/y-axis/icon-kunstig-intelligens-big-data-og-robotter.png" alt="" class="icon"><span>Kunstig intelligens, big data og robotter</span></th>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-born-og-laering" />
          </td>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-arbejdsmarked-og-erhverv" />
          </td>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-social-og-sundhed" />
          </td>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-miljo-teknik-og-forsyning" />
          </td>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-demokrati-og-involvering" />
          </td>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-administration-og-organisation" />
          </td>
        </tr>
        <tr>
          <th scope="row">
            <img src="../assets/icons/y-axis/icon-internet-of-things.png" alt="" class="icon">
            <span>Internet of Things</span>
          </th>
          <td>
            <dot linkParam="kunstig-intelligens-big-data-og-robotter-for-administration-og-organisation" />
          </td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row" title="Teknologiske temaer"><img src="../assets/icons/y-axis/icon-virtual-reality-og-augmented-reality.png" alt="" class="icon"><span>Virtual Reality og Augmented Reality</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/y-axis/icon-deleokonomi-og-blockchain.png" alt="" class="icon"><span>Deleøkonomi og blockchain</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/y-axis/icon-data-privatliv-transparens-og-sikkerhed.png" alt="" class="icon"><span>Data, privatliv, transparens og sikkerhed</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import Dot from '@/components/Dot'
  export default {
    name: 'MatrixRoute',
    components: { dot: Dot }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/animations';
  @import '~@/styles/zindexes';

  $headerHeight: 99px;

  .matrixRoute {
    padding-top: $headerHeight;
    background-color: $color-blue;
    overflow-y: hidden;
  }

  .matrix {
    width: 100%;
    height: calc( 100vh - #{$headerHeight} );
    text-align: center;
    font-family: $fontFamily-serif;
    color: white;
    white-space: pre-line;
    background-color: $color-blue;

    .icon {
      width: 50%;
      max-width: 45px;
      display: block;
      margin: 0 auto;
      margin-bottom: $scale-2-1;
    }

    .label {
      font-family: $fontFamily-sans;
      padding: 4px 6px;
      line-height: 1;
      font-size: $fontSize-xsmall;
      font-weight: bold;
      background-color: $color-yellow;
      color: $color-yellow-darker-2;
      z-index: $zindex-label;
      position: absolute;
      text-transform: uppercase;
      white-space: nowrap;
    }

    thead tr:after {
      content: attr(title); // The title="" on the <tr>
      @extend .label;
      right: calc(50vw - 180px);
      top: 244px;
      @include breakpoint('custom', '1200px') { top: 240px; }
      @include breakpoint('mobile') {
        right: 0;
        top: 152px;
      }
    }


    tbody tr:nth-child(3) th:after {
      content: attr(title); // The title="" on the <tr>
      @extend .label;
      bottom: 50%;
      transform: translateX(-43%) rotate(270deg);
      left: calc(100vw / 7);
      @include breakpoint('custom', '1200px') {
        left: 174px;
        bottom: 100%;
      }
    }

    th[scope="col"] {
      position: relative;
      border-bottom: 4px solid $color-yellow;

      .icon {
        width: auto;
        max-height: 40px;
      }
    }

    tr { width: 100%; }
    td {
      width: calc( 100vw / 7 );
      min-width: 160px;
    }

    tbody tr:nth-child(odd),
    th:nth-child(even),
    td:nth-child(even), { background-color: rgba($color-darkblue, 0.3); }

    th, td {
      padding: $scale-3-1;
      line-height: 1.3;
    }

    th[scope="row"], td { vertical-align: middle; }

    tbody tr:first-child th:before { // Corner of yellow line
      content: '';
      position: absolute;
      width: 4px;
      height: 4px;
      top: -4px;
      right: -4px;
      background-color: $color-yellow;
    }

    th[scope="row"] {
      position: relative;
      border-right: 4px solid $color-yellow;
      text-align: left;
      font-size: $fontSize-small;
      display: flex;
      align-items: center;
      height: 100%;
      span, .icon { display: inline-block; }
      span {
        width: calc(80% - #{$scale});
        position: relative;
        margin-left: $scale-2-1;
        line-height: 1.3;
      }
      .icon {
        width: 20%;
        margin: 0;
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
      height: calc( 100vh - 103px ) !important;
      .corner {
        display: block;
        width: 176px;
      }
      tr:nth-child(odd) th[scope="row"] { background-color: mix($color-darkblue, $color-blue, 30%); }
      th[scope="row"] {
        .icon { display: none; }
        background-color: $color-blue;
        width: 176px;
        height: 100%;
        left: 0;
        position: fixed;
        z-index: $zindex-row;
        padding: $scale-2-1;
        font-size: 14px;
        span {
          margin: 0;
          width: 100%;
          height: 100%
        }
      }
      th { font-size: 14px; }
    }
  }

  @include breakpoint('mobile') {
    th, td { padding: $scale $scale-2-1 !important; }
    th[scope="col"] { vertical-align: middle; }
    .icon { display: none !important; }
    .corner,
    th[scope="row"] { width: 120px; }
  }
</style>
