<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\AbstractSQLBaseDTO;

class ReferenceExerciseDTO extends AbstractSQLBaseDTO
{
    private string $name;
    private string $canonicalName;
    private string $video;
    private array $referenceMuscles;
    private array $referenceEquipments;

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

    public function getVideo(): string
    {
        return $this->video;
    }

    public function setVideo(string $video): void
    {
        $this->video = $video;
    }

    public function getReferenceMuscles(): array
    {
        return $this->referenceMuscles;
    }

    public function setReferenceMuscles(array $referenceMuscles): void
    {
        $this->referenceMuscles = $referenceMuscles;
    }

    public function getReferenceEquipments(): array
    {
        return $this->referenceEquipments;
    }

    public function setReferenceEquipments(array $referenceEquipments): void
    {
        $this->referenceEquipments = $referenceEquipments;
    }
}