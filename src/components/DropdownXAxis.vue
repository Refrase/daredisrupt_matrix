<template>
  <dropdown v-if="technologies" fullWidth class="dropdown-axis" :visible="visible">
    <div v-for="(technology, index) in technologies" class="display-flex margin-bottom-4-1" :key="index">
      <img :src="technology.icon" :style="{ minWidth: '75px' }" height="75px" />
      <div class="margin-left-3-1">
        <h3 class="margin-bottom margin-top">{{ technology.title }}</h3>
        <p>{{ technology.description }}</p>
      </div>
    </div>
  </dropdown>
</template>

<script>
  import Dropdown from '@/components/Dropdown'
  import { fetchData } from '@/utils/fetchData'
  export default {
    name: 'DropdownMatrix',
    mixins: [fetchData],
    components: { 'dropdown': Dropdown },
    props: { visible: Boolean },
    data() {
      return {
        technologies: null
      }
    },
    created() {
      this.fetchData( `dropdowns?slug=omraade-dropdown` ).then( res => { this.technologies = res[0].acf.area_dropdown_technologies })
    }
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
