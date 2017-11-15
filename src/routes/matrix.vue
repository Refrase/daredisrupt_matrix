<template>
  <div class="matrixRoute">
    <table class="matrix" cellspacing="0" cellpadding="0">
      <thead>
        <tr title="Kommunale områder">
          <th class="corner"><div/></th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'born-og-laering' } }">
              <img src="../assets/icons/x-axis/icon-born-og-laering.png" alt="" class="icon">Børn og læring
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'arbejdsmarked-og-erhverv' } }">
              <img src="../assets/icons/x-axis/icon-arbejdsmarked-og-erhverv.png" alt="" class="icon">Arbejdsmarked og erhverv
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'social-og-sundhed' } }">
              <img src="../assets/icons/x-axis/icon-social-og-sundhed.png" alt="" class="icon">Social og sundhed
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'miljo-teknik-og-forsyning' } }">
              <img src="../assets/icons/x-axis/icon-miljo-teknik-og-forsyning.png" alt="" class="icon">Miljø, teknik og forsyning
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'demokrati-og-involvering' } }">
              <img src="../assets/icons/x-axis/icon-demokrati-og-involvering.png" alt="" class="icon">Demokrati og involvering
            </router-link>
          </th>
          <th scope="col">
            <router-link :to="{ name: 'x-axis', params: { id: 'administration-og-organisation' } }">
              <img src="../assets/icons/x-axis/icon-administration-og-organisation.png" alt="" class="icon">Administration og organisation
            </router-link>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'kunstig-intelligens-big-data-og-robotter' } }">
              <img src="../assets/icons/y-axis/kunstig-intelligens-big-data-og-robotter.png" alt="" class="icon"><span>Kunstig intelligens, big data og robotter</span>
            </router-link>
          </th>
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
            <router-link :to="{ name: 'y-axis', params: { id: 'internet-of-things' } }">
              <img src="../assets/icons/y-axis/internet-of-things.png" alt="" class="icon">
              <span>Internet of Things</span>
            </router-link>
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
          <th scope="row" title="Teknologiske temaer">
            <router-link :to="{ name: 'y-axis', params: { id: 'virtual-reality-og-augmented-reality' } }">
              <img src="../assets/icons/y-axis/virtual-reality-og-augmented-reality.png" alt="" class="icon">
              <span>Virtual Reality og Augmented Reality</span>
            </router-link>
          </th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'deleokonomi-og-blockchain' } }">
              <img src="../assets/icons/y-axis/deleokonomi-og-blockchain.png" alt="" class="icon">
              <span>Deleøkonomi og blockchain</span>
            </router-link>
          </th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row">
            <router-link :to="{ name: 'y-axis', params: { id: 'data-privatliv-transparens-og-sikkerhed' } }">
              <img src="../assets/icons/y-axis/data-privatliv-transparens-og-sikkerhed.png" alt="" class="icon">
              <span>Data, privatliv, transparens og sikkerhed</span>
            </router-link>
          </th>
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
      border-bottom-left-radius: $borderRadius;
      border-bottom-right-radius: $borderRadius;
    }

    thead tr:after {
      content: attr(title); // The title="" on the <tr>
      @extend .label;
      right: calc(50vw - 180px);
      top: 247px;
      @include breakpoint('custom', '1200px') { top: 241px; }
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
      left: calc(100vw / 7);
      @include breakpoint('custom', '1200px') {
        left: 172px;
        bottom: 100%;
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

    th[scope="row"], td { vertical-align: middle; }

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

    th[scope="row"] {
      position: relative;
      border-right: 4px solid $color-yellow;
      a {
        color: white;
        text-decoration: underline;
        text-decoration-color: $color-yellow;
        text-align: left;
        font-size: $fontSize-small;
        display: flex;
        align-items: center;
        height: 100%;
        &:hover { text-decoration: none; }
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
        width: 176px;
      }
      tr:nth-child(odd) th[scope="row"] { background-color: mix($color-darkblue, $color-blue, 30%); }
      th[scope="row"] {
        left: 0;
        position: fixed;
        height: 100%;
        z-index: $zindex-row;
        width: 176px;
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
      th,
      th[scope="col"] a { font-size: 14px; }
    }
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
</style>
