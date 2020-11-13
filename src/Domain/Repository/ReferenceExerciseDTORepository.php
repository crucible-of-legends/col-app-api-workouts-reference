<?php

namespace App\Domain\Repository;

use App\Domain\DataInteractor\DTO\ReferenceExerciseDTO;
use COL\Library\Infrastructure\Common\Repository\AbstractSQLBaseRepository;

final class ReferenceExerciseDTORepository extends AbstractSQLBaseRepository
{
    protected function getDTOClassName(): string
    {
        return ReferenceExerciseDTO::class;
    }
}