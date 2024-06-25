import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({

  history: createWebHistory('/app'),
  routes: [
    {
      path: '/',
      name: 'auth',
      component: () => import('../pages/auth/AuthPage.vue'),
      children: [
        {
          path: '/register',
          name: 'register',
          component: () => import('../pages/auth/RegisterPage.vue')
        },
        {
          path: '/login',
          name: 'login',
          component: () => import('../pages/auth/LoginPage.vue')
        },
      ]
    }
  ]
})


export default router