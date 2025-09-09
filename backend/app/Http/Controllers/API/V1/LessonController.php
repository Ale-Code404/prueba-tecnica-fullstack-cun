<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Lessons\LessonResource;
use Illuminate\Http\Request;

use App\Services\Lessons\Application\{
    DTO\LessonInput,
    GetLessons
};

class LessonController extends Controller
{
    /**
     * Get a paginated list of lessons for a specific course.
     * 
     * @param string $courseId The uuid of the course.
     */
    public function index(string $courseId, Request $request, GetLessons $getLessons)
    {
        $request->validate([
            'page' => 'sometimes|integer|min:1',
        ]);

        return LessonResource::collection(
            $getLessons(new LessonInput(
                courseId: $courseId,
                page: request()->input('page', 1),
            ))
        );
    }
}
