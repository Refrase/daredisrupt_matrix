<template>
  <social-sharing class="socialLinks"
    url="http://kommunernes-teknologispring.dk/"
    title="Kommunernes teknologiske fremtid - et værktøj til viden og dialog"
    description="KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid"
    inline-template>
    <div>
      <network network="linkedin">
        <img src="../assets/images/icon-linkedin-white.svg" alt="LinkedIn" height="18" />
      </network>
      <network network="facebook">
        <img src="../assets/images/icon-facebook-white.svg" alt="Facebook" height="18" />
      </network>
      <network network="twitter">
        <img src="../assets/images/icon-twitter-white.svg" alt="Twitter" height="18" />
      </network>
    </div>
  </social-sharing>
</template>

<script>
  export default { name: 'SocialLinks' }
</script>

<style lang="scss" scoped>
  @import '~@/styles/vars';
  @import '~@/styles/breakpoints';

  .socialLinks {
    width: 72px;
    display: flex;
    justify-content: space-between;
    position: relative;
    cursor: pointer;
    top: 2px;
  }
</style>
