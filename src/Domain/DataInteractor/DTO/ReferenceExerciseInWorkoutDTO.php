<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceExerciseInWorkoutDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private ReferenceExerciseDTO $exercise;
    private ReferenceWorkoutDTO $workout;
    private int $position;

    public function getDefaultStatus(): string
    {
        return self::STATUS_ACTIVE;
    }

    public function getExercise(): ReferenceExerciseDTO
    {
        return $this->exercise;
    }

    public function setExercise(ReferenceExerciseDTO $exercise): void
    {
        $this->exercise = $exercise;
    }

    public function getWorkout(): ReferenceWorkoutDTO
    {
        return $this->workout;
    }

    public function setWorkout(ReferenceWorkoutDTO $workout): void
    {
        $this->workout = $workout;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }
}