<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(
            \App\Services\Courses\Domain\CourseRepository::class,
            \App\Repositories\Courses\EloquentCourseRepository::class
        );

        $this->app->bind(
            \App\Services\Lessons\Domain\LessonRepository::class,
            \App\Repositories\Lessons\EloquentLessonRepository::class
        );

        $this->app->bind(
            \App\Services\Questions\Domain\QuestionRepository::class,
            \App\Repositories\Questions\EloquentQuestionRepository::class
        );
    }
}
