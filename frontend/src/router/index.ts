import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/courses/Index.vue'),
    },
    {
      path: '/courses/:courseId',
      name: 'courses.details',
      component: () => import('@/views/courses/Details.vue'),
      props: true,
    },
    {
      path: '/lessons/:lessonId/evaluate',
      name: 'lesson.evaluate',
      component: () => import('@/views/lessons/Evaluate.vue'),
      props: true,
    },
  ],
})

export default router
