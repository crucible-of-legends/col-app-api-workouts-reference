<?php

namespace App\Domain\UseCase;

interface GetManyUserCaseInterface
{
    public function execute(string $displayFormat, array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array;
}