<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;

class RefExerciseOrderedInRefWorkoutDTO extends AbstractSQLBaseDTO
{
    private ReferenceExerciseDTO $referenceExercise;
    private ReferenceWorkoutDTO $referenceWorkout;
    private int $position;

    public function getDefaultStatus(): string
    {
        return self::STATUS_ACTIVE;
    }

    public function getReferenceExercise(): ReferenceExerciseDTO
    {
        return $this->referenceExercise;
    }

    public function setReferenceExercise(ReferenceExerciseDTO $referenceExercise): void
    {
        $this->referenceExercise = $referenceExercise;
    }

    public function getReferenceWorkout(): ReferenceWorkoutDTO
    {
        return $this->referenceWorkout;
    }

    public function setReferenceWorkout(ReferenceWorkoutDTO $referenceWorkout): void
    {
        $this->referenceWorkout = $referenceWorkout;
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