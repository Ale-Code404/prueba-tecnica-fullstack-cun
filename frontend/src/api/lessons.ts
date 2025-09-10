import { client } from '@/api'

interface Lesson {
  id: string
  name: string
  course: {
    id: string
    name: string
  }
}

interface Question {
  id: string
  sentence: string
  options: Array<{
    id: string
    answer: string
  }>
}

interface LessonsResponse {
  meta: {
    total: number
    hasMore: boolean
  }
  lessons: Lesson[]
}

const getLessons = (courseId: string, page: number): Promise<LessonsResponse> => {
  return client.get(`/courses/${courseId}/lessons`, { params: { page } }).then(({ data }) => {
    return {
      lessons: data.data.map((lesson: any) => ({
        id: lesson.id,
        name: lesson.name,
        course: {
          id: lesson.course.id,
          name: lesson.course.name,
        },
      })),
      meta: {
        total: data.meta.total,
        hasMore: data.meta.last_page != page,
      },
    }
  })
}

const getQuestions = (lessonId: string): Promise<Question[]> => {
  return client.get(`/lessons/${lessonId}/questions`).then(({ data }) => {
    return data.data.map((question: any) => ({
      id: question.id,
      sentence: question.sentence,
      options: question.options.map((option: any) => ({
        id: option.uuid,
        answer: option.answer,
      })),
    }))
  })
}

const answerQuestion = (questionId: string, answerId: string): Promise<boolean> => {
  const data = {
    question: questionId,
    answer: answerId,
  }

  return client.post(`/evaluations`, data).then(({ data }) => {
    return new Boolean(data.data.is_correct).valueOf()
  })
}

export { getLessons, getQuestions, answerQuestion }

export type { Lesson, Question, LessonsResponse }
