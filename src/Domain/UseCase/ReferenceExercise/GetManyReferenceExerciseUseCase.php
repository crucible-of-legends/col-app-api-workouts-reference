<?php

namespace App\Domain\UseCase\ReferenceExercise;

use App\Domain\DataInteractor\DTOProvider\ReferenceExerciseDTOProvider;
use App\Domain\UseCase\GetManyUserCaseInterface;
use App\Domain\View\Presenter\ReferenceExercise\GetManyReferenceExerciseViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Infrastructure\Common\View\MultipleObjectViewPresenterInterface;

final class GetManyReferenceExerciseUseCase implements GetManyUserCaseInterface
{
    private ReferenceExerciseDTOProvider $provider;
    private GetManyReferenceExerciseViewPresenter $presenter;

    public function __construct(
        ReferenceExerciseDTOProvider $provider,
        GetManyReferenceExerciseViewPresenter $presenter
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
        if (MultipleObjectViewPresenterInterface::DISPLAY_FORMAT_LARGE === $displayFormat) {
            $selects = ['equipment', 'muscle'];
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