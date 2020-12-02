<?php

namespace App\Domain\DataInteractor\DTOProvider;

use App\Domain\Repository\ReferenceWorkoutDTORepository;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTOProvider;

final class ReferenceWorkoutDTOProvider extends AbstractSQLBaseDTOProvider
{
    public function __construct(ReferenceWorkoutDTORepository $repository)
    {
        $this->repository = $repository;
    }
}