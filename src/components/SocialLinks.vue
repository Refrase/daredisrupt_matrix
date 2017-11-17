<template>
  <div class="socialLinks">
    <a href="https://www.linkedin.com/company/kl">
      <img src="../assets/images/icon-linkedin.svg" alt="LinkedIn" height="18" />
    </a>
    <a href="https://www.facebook.com/kommunerne/?rf=184003641627713">
      <img src="../assets/images/icon-facebook.svg" alt="Facebook" height="18" />
    </a>
    <a href="https://twitter.com/kommunerne?lang=en">
      <img src="../assets/images/icon-twitter.svg" alt="Twitter" height="18" />
    </a>
  </div>
</template>

<script>
  export default { name: 'SocialLinks' }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';

  .socialLinks {
    position: relative;
    @include breakpoint('mobile') { top: 2px; }
    img { margin-left: $scale-1-2; }
  }
</style>
