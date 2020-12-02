<?php

namespace App\Domain\Repository;

use App\Domain\DataInteractor\DTO\ReferenceWorkoutDTO;
use COL\Library\Infrastructure\Adapter\Database\QueryBuilderAdapterInterface;
use COL\Library\Infrastructure\Adapter\Database\SQL\SQLQueryBuilderAdapter;
use COL\Library\Infrastructure\Common\Repository\AbstractSQLBaseRepository;

final class ReferenceWorkoutDTORepository extends AbstractSQLBaseRepository
{
    protected function getDTOClassName(): string
    {
        return ReferenceWorkoutDTO::class;
    }

    public function addCriterionCanonicalName(QueryBuilderAdapterInterface $queryBuilder, ?string $canonicalName): bool
    {
        return $this->addCriterion($queryBuilder, 'canonicalName', $canonicalName);
    }

    public function addSelectExercise(SQLQueryBuilderAdapter $queryBuilderAdapter): void
    {
        $queryBuilderAdapter->addSelect($this->getAlias(), 'orderedExercises');
        $queryBuilderAdapter->addSelect($this->getAlias().'_orderedExercises', 'exercise');
        $queryBuilderAdapter->addSelect($this->getAlias().'_orderedExercises_exercise', 'equipments');
    }
}