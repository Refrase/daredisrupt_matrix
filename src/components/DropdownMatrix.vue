<template>
  <dropdown v-if="dropdown" :visible="visible">
    <h1 class="margin-bottom-2-1">{{ dropdown.title }}</h1>
    <p>{{ dropdown.text }}</p>
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
        dropdown: null
      }
    },
    created() {
      this.fetchData( `dropdowns?slug=matrix-dropdown` ).then( res => { this.dropdown = res[0].acf.matrix_dropdown })
    }
  }
</script>

<style lang="scss" scoped></style>
