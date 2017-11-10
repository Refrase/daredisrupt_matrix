<template>
  <ul class="accordion">
    <accordion-item v-for="(item, index) in items" :key="index" :item="item" />
  </ul>
</template>

<script>
  import AccordionItem from '@/components/AccordionItem'
  export default {
    name: 'Accordion',
    components: { 'accordion-item': AccordionItem },
    props: {
      items: Array,
    }
  }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  .accordion { list-style: none; }
</style>
