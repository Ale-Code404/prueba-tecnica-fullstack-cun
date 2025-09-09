<script lang="ts" setup>
const props = defineProps<{
  lessonId: string
}>()
</script>

<template>
  <div class="breadcrumbs text-sm px-2 py-1 mb-8 self-start rounded bg-gray-600">
    <ul>
      <li>
        <router-link to="/">Lecciones</router-link>
      </li>
      <li>
        {{ props.lessonId }}
      </li>
      <li>Evaluar</li>
    </ul>
  </div>
</template>
