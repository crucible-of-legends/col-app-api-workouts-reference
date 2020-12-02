<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\DatabaseCollectionAdapter;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceWorkoutDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private string $name;
    private string $canonicalName;
    private string $image;
    private $orderedExercises;

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
     * @return ReferenceExerciseInWorkoutDTO[]
     */
    public function getOrderedExercises(): array
    {
        return DatabaseCollectionAdapter::getDatabaseCollection($this->orderedExercises);
    }

    /**
     * @param ReferenceExerciseInWorkoutDTO[] $orderedExercises
     */
    public function setOrderedExercises(array $orderedExercises): void
    {
        $this->orderedExercises = $orderedExercises;
    }
}