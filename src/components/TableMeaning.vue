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
        <th scope="row"><span>{{ rowTitles[index] }}</span></th>
        <td class="hide-mobile"><span v-html="row.where_is_it_seen" />
        <td><span>{{ row.perspective_and_possibilities }}</span></td>
        <td
          class="impact hide-mobileSmall"
          :class="{
            high: row.impact.value === 'high',
            medium: row.impact.value === 'medium',
            low: row.impact.value === 'low'
          }">
          <span>{{ row.impact.label }}</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
  export default {
    name: 'TableMeaning',
    props: { rows: Array },
    data() {
      return {
        technologyRowTitles: [
          'Børn & Læring', 'Arbejdsmarked & Erhverv', 'Social & Sundhed', 'Miljø, Teknik & Forsyning', 'Demokrati & Involvering', 'Administration & Organisation'
        ],
        areaRowTitles: [
          'AI, Big Data & Robotter', 'Internet of Things', 'VR & AR', 'Deleøkonomi & Blockchain', 'Data, Privatliv & Transparens'
        ]
      }
    },
    computed: {
      rowTitles() {
        if ( this.$route.name === 'y-axis' ) return this.technologyRowTitles
        else if ( this.$route.name === 'x-axis' ) return this.areaRowTitles
      }
    }
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
        & /deep/ * { list-style: inside; }
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
