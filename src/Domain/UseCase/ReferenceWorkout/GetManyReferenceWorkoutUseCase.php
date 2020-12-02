<?php

namespace App\Domain\UseCase\ReferenceWorkout;

use App\Domain\UseCase\GetManyUserCaseInterface;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;

final class GetManyReferenceWorkoutUseCase  implements GetManyUserCaseInterface
{

    /**
     *  @return BaseViewModelInterface[]
     */
    public function execute(string $displayFormat, array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array
    {

    }
}