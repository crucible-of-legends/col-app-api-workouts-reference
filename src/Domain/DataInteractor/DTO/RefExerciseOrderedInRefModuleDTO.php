<?php

namespace App\Domain\DataInterfactor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\AbstractSQLBaseDTO;

class RefExerciseOrderedInRefModuleDTO extends AbstractSQLBaseDTO
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