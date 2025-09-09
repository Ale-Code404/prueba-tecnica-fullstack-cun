<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Courses\CourseResource;
use Illuminate\Http\Request;

use App\Services\Courses\Application\{
    DTO\CourseInput,
    GetCourses
};

class CourseController extends Controller
{
    /**
     * Get a paginated list of courses.
     */
    public function index(Request $request, GetCourses $getCourses)
    {
        $request->validate([
            'page' => 'sometimes|integer|min:1',
        ]);

        return CourseResource::collection(
            $getCourses(
                new CourseInput(page: $request->get('page', 1))
            )
        );
    }
}
