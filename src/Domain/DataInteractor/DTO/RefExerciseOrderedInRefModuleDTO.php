<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;

final class RefExerciseOrderedInRefModuleDTO extends AbstractSQLBaseDTO
{
    private ReferenceExerciseDTO $referenceExercise;
    private ReferenceModuleDTO $referenceModule;
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

    public function getReferenceModule(): ReferenceModuleDTO
    {
        return $this->referenceModule;
    }

    public function setReferenceModule(ReferenceModuleDTO $referenceModule): void
    {
        $this->referenceModule = $referenceModule;
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