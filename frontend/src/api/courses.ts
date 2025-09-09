import { client } from '@/api'

interface Course {
  id: string
  name: string
  description: string
}

interface CoursesResponse {
  meta: {
    total: number
    hasMore: boolean
  }
  courses: Course[]
}

function getCourses(page = 1): Promise<CoursesResponse> {
  return client.get('/courses', { params: { page } }).then((response) => {
    const data = response.data

    return {
      courses: data.data.map((course: any) => ({
        id: course.id,
        name: course.name,
        description: course.description,
      })),
      meta: {
        total: data.meta.total,
        hasMore: data.meta.last_page != page,
      },
    }
  })
}

export { getCourses }

export type { Course, CoursesResponse }
