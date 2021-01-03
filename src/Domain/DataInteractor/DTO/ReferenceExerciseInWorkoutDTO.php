<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceExerciseInWorkoutDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private ReferenceExerciseDTO $exercise;
    private ReferenceWorkoutDTO $workout;

    private ?int $restDuration; // in seconds
    private ?int $nbReps;
    private ?int $distance; // in meters
    private ?int $duration; // in seconds
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

    public function getRestDuration(): ?int
    {
        return $this->restDuration;
    }

    public function setRestDuration(?int $restDuration): void
    {
        $this->restDuration = $restDuration;
    }

    public function getNbReps(): ?int
    {
        return $this->nbReps;
    }

    public function setNbReps(?int $nbReps): void
    {
        $this->nbReps = $nbReps;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(?int $distance): void
    {
        $this->distance = $distance;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): void
    {
        $this->duration = $duration;
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