<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceProgramDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private string $name;
    private string $canonicalName;
    private string $image;
    private int $duration; // in weeks

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

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }
}