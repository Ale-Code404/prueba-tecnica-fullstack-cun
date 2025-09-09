<?php

namespace App\Repositories\Questions;

use App\Models\Question as QuestionModel;
use App\Services\Questions\Domain\QuestionRepository;
use Illuminate\Support\Collection;

class EloquentQuestionRepository implements QuestionRepository
{
    public function getQuestions(string $lessonId): Collection
    {
        return QuestionModel::query()
            ->where('lesson_id', $lessonId)
            ->get();
    }

    public function findById(string $id): ?QuestionModel
    {
        return QuestionModel::query()
            ->find($id);
    }
}
