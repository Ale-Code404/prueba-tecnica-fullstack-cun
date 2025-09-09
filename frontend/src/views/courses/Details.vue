<script lang="ts" setup>
import { ref } from 'vue'

import type { Lesson } from '@/api/lessons'
import { getLessons } from '@/api/lessons'

import LessonList from '@/components/lessons/LessonList.vue'

const props = defineProps<{
  courseId: string
}>()

const lessons = ref<Lesson[]>([])
const page = ref(1)
const total = ref(0)

const isLoading = ref(true)

getLessons(props.courseId, page.value)
  .then((response) => {
    lessons.value = response.lessons
    total.value = response.meta.total
  })
  .finally(() => {
    isLoading.value = false
  })
</script>

<template>
  <div class="breadcrumbs text-sm px-2 py-1 mb-8 self-start rounded bg-gray-600">
    <ul>
      <li>
        <router-link to="/">Cursos</router-link>
      </li>
      <li>
        {{ props.courseId }}
      </li>
      <li>Lecciones</li>
    </ul>
  </div>

  <div class="mb-8 bg-primary p-4 rounded-md">
    <h1 class="text-xl font-bold mb-2">Lecciones del curso</h1>
    <p>
      Cada curso comprende varias lecciones que te ayudarán a entender mejor los conceptos y
      habilidades.
    </p>
  </div>

  <lesson-list :lessons="lessons" :total="total" :is-loading="isLoading" />
</template>
