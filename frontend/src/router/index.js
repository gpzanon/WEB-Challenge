import Vue from 'vue'
import VueRouter from 'vue-router'
import Vehicles from '../views/Vehicles'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Vehicles',
    component: Vehicles
  }
]

const router = new VueRouter({
  routes
})

export default router
