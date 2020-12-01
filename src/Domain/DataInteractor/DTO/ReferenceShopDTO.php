<?php

namespace App\Domain\DataInteractor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\DatabaseCollectionAdapter;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTO;
use COL\Library\Infrastructure\Common\DTO\TimeAwareDTOTrait;

class ReferenceShopDTO extends AbstractSQLBaseDTO
{
    use TimeAwareDTOTrait;

    private string $name;
    private ?string $logo;
    private string $url;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): void
    {
        $this->logo = $logo;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getEquipments(): array
    {
        return DatabaseCollectionAdapter::getDatabaseCollection($this->equipments);
    }

    public function setEquipments(array $equipments): void
    {
        $this->equipments = $equipments;
    }
}