<script lang="ts" setup>
import { ref, watch } from 'vue'

import type { Question } from '@/api/lessons'
import { answerQuestion } from '@/api/lessons'

const props = defineProps<{
  questions: Question[]
}>()

const emit = defineEmits<{
  (e: 'finish'): void
}>()

const currentIndex = ref(0)
const current = ref<Question | null>(null)

const answer = ref<string | null>(null)
const isLoading = ref(false)

watch(
  () => props.questions,
  () => {
    if (props.questions.length) {
      current.value = props.questions[currentIndex.value]
    }
  },
)

function evaluateAnswer() {
  if (!current.value || !answer.value) {
    return
  }

  isLoading.value = true
  answerQuestion(current.value.id, answer.value)
    .then((isCorrect) => {
      if (!isCorrect) return

      if (isLastQuestion()) {
        return emit('finish')
      }

      getNextQuestion()
    })
    .finally(() => {
      isLoading.value = false
    })
}

function getNextQuestion() {
  if (currentIndex.value + 1 < props.questions.length) {
    currentIndex.value++
    current.value = props.questions[currentIndex.value]
    answer.value = null
  }
}

function isLastQuestion() {
  return currentIndex.value + 1 == props.questions.length
}
</script>

<template>
  <ul class="steps steps-vertical lg:steps-horizontal">
    <li
      v-for="(question, index) in props.questions"
      :key="index"
      class="step"
      :class="{ 'step-primary': current && question.id == current.id }"
    >
      Pregunta No. {{ index + 1 }}
    </li>
  </ul>

  <div v-if="current" class="mt-8 mx-40">
    <p class="font-bold text-lg mb-8" v-if="current">
      {{ current.sentence }}
    </p>

    <div class="flex justify-around gap-4">
      <fieldset
        class="fieldset bg-base-100 border-base-300 rounded-box w-64 border p-4 grow"
        v-for="(option, index) in current.options"
        :key="index"
      >
        <label class="label">
          <input
            type="radio"
            name="question-{{ current.id }}"
            class="radio"
            :value="option.id"
            v-model="answer"
          />
          {{ option.answer }}
        </label>
      </fieldset>
    </div>

    <button
      class="btn btn-primary btn-block mt-8"
      :disabled="!answer || isLoading"
      @click="evaluateAnswer"
    >
      Siguiente
    </button>
  </div>
</template>
