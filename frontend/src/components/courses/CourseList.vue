<script setup lang="ts">
import { defineProps } from 'vue'
import type { Course } from '@/api/courses'

const props = defineProps<{
  courses: Course[]
  isLoading: boolean
}>()
</script>

<template>
  <transition-group name="fade" tag="div" class="grid grid-cols-4 gap-6">
    <div
      class="min-h-60 card card-border bg-base-100 rounded-md"
      v-for="course in props.courses"
      :key="course.id"
    >
      <div class="card-body">
        <div class="badge badge-primary">Curso</div>

        <h2 class="card-title">{{ course.name }}</h2>
        <p class="h-16 overflow-hidden">
          {{ course.description }}
        </p>
        <div class="card-actions mt-2">
          <router-link
            :to="{ name: 'courses.details', params: { courseId: course.id } }"
            class="btn btn-primary btn-block"
          >
            Ver lecciones
          </router-link>
        </div>
      </div>
    </div>

    <template v-if="props.isLoading">
      <div
        class="skeleton col-span-1 w-full min-h-60 rounded-md"
        v-for="index in 4"
        :key="`loading-course-${index}`"
      />
    </template>
  </transition-group>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: all 150ms ease;
}
.fade-enter-from {
  opacity: 0;
  transform: translateY(-10px);
}
.fade-leave-to {
  opacity: 0;
  transform: translateY(10px);
}
</style>
