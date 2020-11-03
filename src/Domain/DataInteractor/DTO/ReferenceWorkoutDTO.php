<?php

namespace App\Domain\DataInterfactor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\AbstractSQLBaseDTO;

class ReferenceWorkoutDTO extends AbstractSQLBaseDTO
{
    private string $name;
    private string $canonicalName;
    private string $image;
    private array $refExercisesOrdered;
    private array $referenceModulesOrdered;

    public function getDefaultStatus(): string
    {
        return self::STATUS_ACTIVE;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCanonicalName(): string
    {
        return $this->canonicalName;
    }

    public function setCanonicalName(string $canonicalName): void
    {
        $this->canonicalName = $canonicalName;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return RefExerciseOrderedInRefWorkoutDTO[]
     */
    public function getRefExercisesOrdered(): array
    {
        return $this->refExercisesOrdered;
    }

    /**
     * @param RefExerciseOrderedInRefWorkoutDTO[]
     */
    public function setRefExercisesOrdered(array $refExercisesOrdered): void
    {
        $this->refExercisesOrdered = $refExercisesOrdered;
    }

    public function getReferenceModulesOrdered(): array
    {
        return $this->referenceModulesOrdered;
    }

    public function setReferenceModulesOrdered(array $referenceModulesOrdered): void
    {
        $this->referenceModulesOrdered = $referenceModulesOrdered;
    }
}