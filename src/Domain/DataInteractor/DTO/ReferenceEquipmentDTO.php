<?php

namespace App\Domain\DataInterfactor\DTO;

use COL\Library\Infrastructure\Adapter\Database\SQL\AbstractSQLBaseDTO;

class ReferenceEquipmentDTO extends AbstractSQLBaseDTO
{
    private string $name;
    private string $canonicalName;
    private string $image;
    private array $shops;

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

    public function getShops(): array
    {
        return $this->shops;
    }

    public function setShops(array $shops): void
    {
        $this->shops = $shops;
    }
}