<script setup lang="ts">
import { ref } from 'vue'

import { getCourses } from '@/api/courses'
import type { Course } from '@/api/courses'

import CourseList from '@/components/courses/CourseList.vue'

const courses = ref<Course[]>([])
const total = ref(0)
const hasMore = ref(false)
const isLoading = ref(true)

getCourses()
  .then((response) => {
    courses.value = response.courses
    total.value = response.meta.total
    hasMore.value = response.meta.hasMore
  })
  .finally(() => {
    isLoading.value = false
  })
</script>

<template>
  <div class="breadcrumbs text-sm px-2 py-1 mb-4 self-start rounded bg-gray-600">
    <ul>
      <li>
        <router-link to="/">Cursos</router-link>
      </li>
    </ul>
  </div>

  <div class="bg-primary p-4 my-8 rounded-md">
    <h1 class="text-5xl font-bold mb-4">Cursos disponibles</h1>
    <p>
      Aqui podras encontrar todos los cursos disponibles para mejorar tus habilidades y
      conocimientos.
    </p>
  </div>

  <section class="mb-8">
    <fieldset class="fieldset">
      <legend class="fieldset-legend text-lg">¿Qué quieres aprender?</legend>
      <input
        type="text"
        placeholder="Ej: Bases de Datos, Análisis de Datos, Desarrollo Web"
        class="input w-full"
      />
    </fieldset>
  </section>

  <course-list :courses="courses" :is-loading="isLoading" />
</template>
