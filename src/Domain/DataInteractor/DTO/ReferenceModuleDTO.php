<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceModuleDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

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