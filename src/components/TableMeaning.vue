<template>
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
      <tr v-for="(row, index) in rows">
        <th scope="row"><span>{{ row.title }}</span></th>
        <td class="hide-mobile"><span>{{ row.whereIsItSeen }}</span></td>
        <td><span>{{ row.perspectivesAndPossibilities }}</span></td>
        <td class="impact hide-mobileSmall" :class="{ high: row.impact === 'Høj', medium: row.impact === 'Mellem', low: row.impact === 'Lav' }">
          <span>{{ row.impact }}</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
  export default {
    name: 'TableMeaning',
    props: { rows: Array }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';
  @import '~@/styles/helpers';
  .table-meanings {
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
