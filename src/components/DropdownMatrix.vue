<template>
  <dropdown :visible="visible">
    <h1 class="margin-bottom-2-1">Test</h1>
    <p>Indhold...</p>
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

<style lang="scss" scoped></style>
