<template>
  <social-sharing class="socialLinks"
    :url="href ? href : shareLink"
    :title="title ? 'Kommunernes teknologiske fremtid: ' + title : 'Kommunernes teknologiske fremtid - et værktøj til viden og dialog'"
    :description="description ? description : 'KL har bedt DareDisrupt kortlægge perspektiverne af nye teknologier for kommunernes fremtid'"
    inline-template>
    <div>
      <network network="linkedin">
        <img src="../assets/images/icon-linkedin.svg" alt="LinkedIn" height="18" />
      </network>
      <network network="facebook">
        <img src="../assets/images/icon-facebook.svg" alt="Facebook" height="18" />
      </network>
      <network network="twitter">
        <img src="../assets/images/icon-twitter.svg" alt="Twitter" height="18" />
      </network>
    </div>
  </social-sharing>
</template>

<script>
  import SocialSharing from 'vue-social-sharing'
  export default {
    name: 'SocialLinks',
    components: { 'social-sharing': SocialSharing },
    props: {
      href: String,
      title: String,
      description: String
    },
    data() {
      return {
        shareLink: window.location.host
      }
    },
    updated() { this.shareLink = window.location.host + this.$route.path }
  }
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
    @include breakpoint('mobile') { top: 2px; }
  }
</style>
