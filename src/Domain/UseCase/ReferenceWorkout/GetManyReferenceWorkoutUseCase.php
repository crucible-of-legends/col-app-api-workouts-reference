<?php

namespace App\Domain\UseCase\ReferenceWorkout;

use App\Domain\DataInteractor\DTOProvider\ReferenceWorkoutDTOProvider;
use App\Domain\UseCase\GetManyUseCaseInterface;
use App\Domain\View\Presenter\ReferenceWorkout\GetManyReferenceWorkoutViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Infrastructure\Common\Registry\DisplayFormatRegistry;

final class GetManyReferenceWorkoutUseCase  implements GetManyUseCaseInterface
{
    private ReferenceWorkoutDTOProvider $provider;
    private GetManyReferenceWorkoutViewPresenter $presenter;

    public function __construct(
        ReferenceWorkoutDTOProvider $provider,
        GetManyReferenceWorkoutViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }
    /**
     *  @return BaseViewModelInterface[]
     */
    public function execute(string $displayFormat, array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array
    {
        $selects = [];
        if (DisplayFormatRegistry::DISPLAY_FORMAT_LARGE === $displayFormat) {
            $selects = ['exercise'];
        }

        return $this->presenter->buildMultipleObjectVueModel(
            $this->provider->getManyByCriteria($criteria, $selects, [], $pageNumber, $nbPerPage),
            $displayFormat,
            $this->provider->countByCriteria($criteria),
            $pageNumber,
            $nbPerPage
        );
    }
}