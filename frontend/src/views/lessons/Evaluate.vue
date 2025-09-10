<script lang="ts" setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

import { getQuestions } from '@/api/lessons'
import type { Question } from '@/api/lessons'

import Evaluation from '@/components/lessons/Evaluation.vue'

const props = defineProps<{
  lessonId: string
}>()

const router = useRouter()
const questions = ref<Question[]>([])

function onFinished() {
  router.push({
    name: 'home',
  })
}

getQuestions(props.lessonId).then((response) => {
  questions.value = response
})
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

  <div class="mb-8 bg-primary p-4 rounded-md">
    <h1 class="text-xl font-bold mb-2">Evaluando la lección</h1>
    <p>
      A continuación se presentan las preguntas de la lección. Por favor, responde cada una de ellas
      con sinceridad y precisión.
    </p>
  </div>

  <div class="flex flex-col bg-base-100 rounded-md p-4 grow">
    <evaluation :questions="questions" @finish="onFinished" />
  </div>
</template>
