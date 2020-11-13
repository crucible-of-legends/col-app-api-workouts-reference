<?php

namespace App\Domain\DataInteractor\DTOProvider;

use App\Domain\Repository\ReferenceExerciseDTORepository;
use COL\Library\Infrastructure\Common\DTO\AbstractSQLBaseDTOProvider;

final class ReferenceExerciseDTOProvider extends AbstractSQLBaseDTOProvider
{
    public function __construct(ReferenceExerciseDTORepository $repository)
    {
        $this->repository = $repository;
    }
}