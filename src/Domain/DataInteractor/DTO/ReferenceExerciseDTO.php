<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\DatabaseCollectionAdapter;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceExerciseDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private string $name;
    private string $canonicalName;
    private string $video;

    /** @var ReferenceMuscleDTO[] */
    private $muscles;
    /** @var ReferenceEquipmentDTO[] */
    private $equipments;

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

    /**
     * @return ReferenceMuscleDTO[]
     */
    public function getMuscles(): array
    {
        return DatabaseCollectionAdapter::getDatabaseCollection($this->muscles);
    }

    /**
     * @param  ReferenceMuscleDTO[] $muscles
     */
    public function setMuscles(array $muscles): void
    {
        $this->muscles = $muscles;
    }

    /**
     * @return ReferenceEquipmentDTO[]
     */
    public function getEquipments(): array
    {
        return DatabaseCollectionAdapter::getDatabaseCollection($this->equipments);
    }

    /**
     * @param  ReferenceEquipmentDTO[] $equipments
     */
    public function setEquipments(array $equipments): void
    {
        $this->equipments = $equipments;
    }
}