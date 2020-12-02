<?php

namespace App\Domain\Repository;

use App\Domain\DataInteractor\DTO\ReferenceExerciseDTO;
use COL\Library\Infrastructure\Adapter\Database\QueryBuilderAdapterInterface;
use COL\Library\Infrastructure\Adapter\Database\SQL\SQLQueryBuilderAdapter;
use COL\Library\Infrastructure\Common\Repository\AbstractSQLBaseRepository;

final class ReferenceExerciseDTORepository extends AbstractSQLBaseRepository
{
    protected function getDTOClassName(): string
    {
        return ReferenceExerciseDTO::class;
    }

    public function addCriterionCanonicalName(QueryBuilderAdapterInterface $queryBuilder, ?string $canonicalName): bool
    {
        return $this->addCriterion($queryBuilder, 'canonicalName', $canonicalName);
    }

    public function addSelectEquipment(SQLQueryBuilderAdapter $queryBuilderAdapter): void
    {
        $queryBuilderAdapter->addSelect($this->getAlias(), 'equipments');
    }

    public function addSelectMuscle(SQLQueryBuilderAdapter $queryBuilderAdapter): void
    {
        $queryBuilderAdapter->addSelect($this->getAlias(), 'muscles');
    }
}