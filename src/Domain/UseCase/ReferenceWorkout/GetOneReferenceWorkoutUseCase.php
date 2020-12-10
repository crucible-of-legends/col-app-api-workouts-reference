<?php

namespace App\Domain\UseCase\ReferenceWorkout;

use App\Domain\DataInteractor\DTOProvider\ReferenceWorkoutDTOProvider;
use App\Domain\View\Presenter\ReferenceWorkout\GetOneReferenceWorkoutViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\GetOneReferenceWorkoutViewModel;

final class GetOneReferenceWorkoutUseCase
{
    private ReferenceWorkoutDTOProvider $provider;
    private GetOneReferenceWorkoutViewPresenter $presenter;

    public function __construct(
        ReferenceWorkoutDTOProvider $provider,
        GetOneReferenceWorkoutViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }

    /**
     * @param string $canonicalName
     *
     * @return BaseViewModelInterface|GetOneReferenceWorkoutViewModel
     */
    public function execute(string $canonicalName): ?GetOneReferenceWorkoutViewModel
    {
        $viewModel = $this->provider->getOneByCriteria(['canonicalName' => $canonicalName], ['exercise']);
        if (null === $viewModel) {
            return null;
        }

        return $this->presenter->buildSingleObjectVueModel($viewModel);
    }
}