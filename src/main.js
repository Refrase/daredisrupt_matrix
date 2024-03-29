import Vue from 'vue'
import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import App from './components/App.vue'
import { routes } from './routes'
import SocialSharing from 'vue-social-sharing'

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(SocialSharing);

// Vue.config.debug = true

// Creating eventBus to handle non-parent-child communication for now
const EventBus = new Vue()
// Attaching it as a global $bus variable
Object.defineProperties(Vue.prototype, {
  $bus: {
    get: () => { return EventBus }
  }
})

const router = new VueRouter({
  routes,
  linkActiveClass: 'active',
  scrollBehavior (to, from, savedPosition) {
    return { x: 0, y: 0 }
  },
  mode: 'history' // TODO: Remember to set up the server to ALWAYS serve the index.html file when this history-mode is on (to avoid hashes in the url)
})

router.beforeEach( (to, from, next) => {
  const routeChange = {
    from: from,
    to: to
  }
  EventBus.$emit( 'routeChange', routeChange )

  if ( to.name === 'dot' ) { // If coming from matrix delay route change for the dot animation
    setTimeout( () => {
      next()
    }, 300)
  } else {
    next()
  }
})

const Matrix = Vue.extend({
  components: { 'app': App },
  template: '<app />'
})

new Vue({
  el: '#app',
  router,
  render: h => h(Matrix)
})
