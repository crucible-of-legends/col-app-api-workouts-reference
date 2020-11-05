<?php

namespace App\Domain\Repository;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Infrastructure\Common\Repository\AbstractSQLBaseRepository;

final class ReferenceEquipmentDTORepository extends AbstractSQLBaseRepository
{
    protected function getDTOClassName(): string
    {
        return ReferenceEquipmentDTO::class;
    }
}