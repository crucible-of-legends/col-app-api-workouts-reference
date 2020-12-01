<?php

namespace App\Domain\Repository;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Infrastructure\Adapter\Database\QueryBuilderAdapterInterface;
use COL\Library\Infrastructure\Adapter\Database\SQL\SQLQueryBuilderAdapter;
use COL\Library\Infrastructure\Common\Repository\AbstractSQLBaseRepository;

final class ReferenceEquipmentDTORepository extends AbstractSQLBaseRepository
{
    protected function getDTOClassName(): string
    {
        return ReferenceEquipmentDTO::class;
    }

    public function addCriterionCanonicalName(QueryBuilderAdapterInterface $queryBuilder, ?string $canonicalName): bool
    {
        return $this->addCriterion($queryBuilder, 'canonicalName', $canonicalName);
    }

    public function addSelectShop(SQLQueryBuilderAdapter $queryBuilderAdapter): void
    {
        $queryBuilderAdapter->addSelect($this->getAlias(), 'shops');
    }
}