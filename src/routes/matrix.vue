<template>
  <div class="matrixRoute">
    <table class="matrix" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="corner"><div/></th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Børn og læring</th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Arbejdsmarked og erhverv</th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Social og sundhed</th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Miljø, teknik og forsyning</th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Demokrati og involvering</th>
          <th scope="col"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon">Administration og organisation</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon"><span>Kunstig intelligens, big data og robotter</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon"><span>Internet of Things</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon"><span>Virtual Reality og Augmented Reality</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon"><span>Deleøkonomi og blockchain</span></th>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
          <td><span/></td>
        </tr>
        <tr>
          <th scope="row"><img src="../assets/icons/icon-placeholder.png" alt="" class="icon"><span>Data, privatliv, transparens og sikkerhed</span></th>
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
  import GridBlock from '@/components/GridBlock'
  export default { name: 'MatrixRoute' }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/animations';

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

    th[scope="col"] {
      position: relative;
      height: 100%;
      border-bottom: 4px solid $color-yellow;
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
      span {
        display: block;
        border-radius: 100%;
        margin: 0 auto;
        width: 28px;
        height: 28px;
        background-color: white;
        cursor: pointer;

        box-shadow: 0 0 0 0 rgba($color-darkblue, 0.4);
        animation: pulse 2s infinite;

        transform: scale(1);
        transition: transform .15s ease-out;

        &:hover {
          animation: none;
          transform: scale(1.2);
        }
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
        z-index: 1;
        padding: $scale-2-1;
        font-size: 12px;
        span {
          margin: 0;
          width: 100%;
          height: 100%
        }
      }
    }
  }
  @include breakpoint('mobile') {
    th, td { padding: $scale-2-1 !important; }
    th[scope="col"] { vertical-align: bottom; }
    .icon { display: none !important; }
    .corner,
    th[scope="row"] { width: 120px; }
  }
</style>
