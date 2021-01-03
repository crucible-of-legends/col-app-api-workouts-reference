<?php

namespace App\Domain\UseCase;

interface GetManyUseCaseInterface
{
    public function execute(string $displayFormat, array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array;
}