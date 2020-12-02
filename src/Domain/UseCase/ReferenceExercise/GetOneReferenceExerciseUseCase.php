<?php

namespace App\Domain\UseCase\ReferenceExercise;

use App\Domain\DataInteractor\DTOProvider\ReferenceExerciseDTOProvider;
use App\Domain\View\Presenter\ReferenceExercise\GetOneReferenceExerciseViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetOneReferenceExerciseViewModel;

final class GetOneReferenceExerciseUseCase
{
    private ReferenceExerciseDTOProvider $provider;
    private GetOneReferenceExerciseViewPresenter $presenter;

    public function __construct(
        ReferenceExerciseDTOProvider $provider,
        GetOneReferenceExerciseViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }

    /**
     * @param string $canonicalName
     *
     * @return BaseViewModelInterface|GetOneReferenceExerciseViewModel
     */
    public function execute(string $canonicalName): ?GetOneReferenceExerciseViewModel
    {
        $viewModel = $this->provider->getOneByCriteria(['canonicalName' => $canonicalName], ['equipment', 'muscle']);
        if (null === $viewModel) {
            return null;
        }

        return $this->presenter->buildSingleObjectVueModel($viewModel);
    }
}