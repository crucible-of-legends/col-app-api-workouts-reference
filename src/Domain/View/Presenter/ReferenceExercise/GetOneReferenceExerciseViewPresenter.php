<?php

namespace App\Domain\View\Presenter\ReferenceExercise;

use App\Domain\DataInteractor\DTO\ReferenceExerciseDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\SingleObjectViewPresenterInterface;

final class GetOneReferenceExerciseViewPresenter implements SingleObjectViewPresenterInterface
{
    /**
     * @param BaseDTOInterface|ReferenceExerciseDTO $dto
     *
     * @return BaseViewModelInterface|GetOneReferenceExerciseViewModel
     */
    public function buildSingleObjectVueModel(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetOneReferenceExerciseViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();

        return $model;
    }
}