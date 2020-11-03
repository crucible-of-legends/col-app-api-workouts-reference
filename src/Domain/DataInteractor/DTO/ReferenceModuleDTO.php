<?php

namespace App\Domain\DataInterfactor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\AbstractSQLBaseDTO;

class ReferenceModuleDTO extends AbstractSQLBaseDTO
{
    private string $name;
    private string $canonicalName;
    private array $refExercisesOrdered;

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

    /**
     * @return RefExerciseOrderedInRefModuleDTO[]
     */
    public function getRefExercisesOrdered(): array
    {
        return $this->refExercisesOrdered;
    }

    /**
     * @param RefExerciseOrderedInRefModuleDTO[]
     */
    public function setRefExercisesOrdered(array $refExercisesOrdered): void
    {
        $this->refExercisesOrdered = $refExercisesOrdered;
    }
}