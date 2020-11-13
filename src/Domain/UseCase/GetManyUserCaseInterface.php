<?php

namespace App\Domain\UseCase;

interface GetManyUserCaseInterface
{
    public function execute(array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array;
}