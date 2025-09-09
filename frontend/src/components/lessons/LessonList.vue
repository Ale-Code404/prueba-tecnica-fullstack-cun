<script lang="ts" setup>
import type { Lesson } from '@/api/lessons'

const props = defineProps<{
  lessons: Lesson[]
  total: number
  isLoading: boolean
}>()
</script>

<template>
  <ul class="list bg-base-100 rounded-box shadow-md">
    <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">
      Este curso comprende ({{ props.total }}) lecciones
    </li>

    <li class="list-row" v-for="(lesson, index) in props.lessons" :key="index">
      <div class="text-4xl font-thin tabular-nums min-w-14 text-center">
        {{ index + 1 }}
      </div>
      <div class="list-col-grow">
        <div class="badge badge-primary mb-2">Curso: {{ lesson.course.name }}</div>
        <p>{{ lesson.name }}</p>
      </div>
      <router-link
        :to="{ name: 'lesson.evaluate', params: { lessonId: lesson.id } }"
        class="btn btn-primary"
        >Probar suerte</router-link
      >
    </li>
  </ul>
</template>
