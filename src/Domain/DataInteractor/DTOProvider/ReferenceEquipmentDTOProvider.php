<?php

namespace App\Domain\DataInteractor\DTOProvider;

use App\Domain\Repository\ReferenceEquipmentDTORepository;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTOProvider;

final class ReferenceEquipmentDTOProvider extends AbstractSQLBaseDTOProvider
{
    public function __construct(ReferenceEquipmentDTORepository $repository)
    {
        $this->repository = $repository;
    }
}